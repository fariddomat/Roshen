<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Propertie;

use App\Models\Apartment;
use App\Models\ApartmentImage;
use App\Models\LogSystem;
use Illuminate\Support\Facades\Redirect;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $project = Project::find($request->projectId);
        if ($project) {
            $apartments = Apartment::where('project_id', $project->id)->paginate(10);
            return view('dashboard.apartments.index', compact('project', 'apartments'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project = Project::find($request->projectId);
        if ($project) {
            return view('dashboard.apartments.create', compact('project'));
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'code' => 'required',
            'room_count' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'about' => 'nullable',
            'price' => 'nullable|numeric|min:0',
            'price_bank' => 'nullable|numeric|min:0',
            'details' => 'required',
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $request_data = $request->except(['img', 'pdfs']);


        $project = Project::find($request->project_id);


        // $reservation = null;

        // if ($request->appendix) {
        //     for ($j = 0; $j < $project->appendix_count; $j++) {
        //         $reservation[0][$j] = 0;
        //     }
        // } else
        //     for ($i = 0; $i < $request->count; $i++) {
        //         for ($j = 0; $j < $project->floors_count; $j++) {
        //             $reservation[$i][$j] = 0;
        //         }
        //     }
        // // $d=json_encode($reservation);
        // // dd(json_decode($d));
        // $request_data['reservation'] = json_encode($reservation);

        if($request->type == "ملحق"){

            $request_data['appendix'] = 'on';

        }
        $apartment=Apartment::create($request_data);

        foreach ($request->file('img') as $file) {

            $img = Image::make($file)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp', 90);

            Storage::disk('public')->put('images/apartments/' . $apartment->id . '/' . $file->hashName(), (string)$img, 'public');

            ApartmentImage::create([
                'apartment_id' => $apartment->id,
                'img' => $file->hashName()
            ]);
        }


        if ($request->hasFile('pdfs')) {
            foreach ($request->file('pdfs') as $file) {
                $path = $file->store('images/' . $project->id . '/pdfs','public');

                $apartment->pdfs()->create([
                    'name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                ]);
            }
        }
        LogSystem::success('تم إضافة ' . $request->type . ' بنجاح - اسم المشروع: ' . $project->name);

        session()->flash('success', 'Successfully Created !');
        return redirect()->route('dashboard.apartments.index', ['projectId' => $request->project_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id);
        if(!$apartment){
            abort(404);
        }
        // dd($apartment->reservation);
        return view('dashboard.apartments.check', compact('apartment'));
    }

    public function check($id)
    {


        $apartment = Apartment::find($id);
        $ar = json_decode($apartment->reservation);

        $ar[request()->apartment - 1][request()->floor - 1] = request()->status;
        $r = json_encode($ar);
        $apartment->update([
            'reservation' => $r
        ]);
        LogSystem::success('تم تعديل حالة شقة إلى ' . request()->status . ' بنجاح - اسم المشروع: ' . $apartment->project->name);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $apartment = Apartment::find($id);
        if ($apartment) {

            $project = Project::find($apartment->project_id);
            return view('dashboard.apartments.edit', compact('apartment', 'project'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $try = Apartment::where('project_id', $request->project_id)->where('type', $request->type)->get();

        // $apartment = Apartment::find($id);
        // if ($try->count() > 0 && $try[0]->id != $apartment->id) {
        //     return Redirect::back()->withInput($request->input())->withErrors(['msg' => 'نوع الشقق هذا موجود مسبقا']);
        // }
        $request->validate([
            'type' => 'required',
            'area' => 'required|numeric|min:0',
            'room_count' => 'required|numeric|min:0',
            'about' => 'nullable',
            'price' => 'nullable|numeric|min:0',
            'price_bank' => 'nullable|numeric|min:0',
            'details' => 'required',
            'img.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',

        ]);

        $apartment = Apartment::find($id);
        $request_data = $request->except(['img', 'appendix','pdfs']);


        if($request->type == "ملحق"){

            $request_data['appendix'] = 'on';

        }else{
            $request_data['appendix'] = '';

        }

        $apartment->update($request_data);
        $project = Project::find($apartment->project_id);

        if ($request->img) {

            $projectImages = ApartmentImage::where('apartment_id', $apartment->id);
            // dd($projectImages);
            // foreach ($projectImages->get() as $key => $item) {
            //     // dd($item->img);
            //     Storage::disk('public')->delete('images/apartments/' . $apartment->id . '/' . $item->img);
            // }
            // $projectImages->delete();
            foreach ($request->file('img') as $file) {
                // dd(true);
                $img = Image::make($file)
                    ->resize(null, 800, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('webp', 90);

                Storage::disk('public')->put('images/apartments/' . $apartment->id . '/' . $file->hashName(), (string)$img, 'public');

                ApartmentImage::create([
                    'apartment_id' => $apartment->id,
                    'img' => $file->hashName()
                ]);
            }
        }

        if ($request->hasFile('pdfs')) {
            // Delete old PDFs
            foreach ($apartment->pdfs as $key => $pdf) {
                Storage::disk('public')->delete($pdf->file_path);
            }
            $apartment->pdfs()->delete();
            foreach ($request->file('pdfs') as $file) {
                $path = $file->store('images/' . $project->id . '/pdfs', 'public');

                $apartment->pdfs()->create([
                    'name' => $file->getClientOriginalName(),
                    'file_path' => $path,
                ]);
            }
        }
        LogSystem::info('تم تعديل ' . $apartment->type . ' بنجاح - اسم المشروع: ' . $project->name);

        session()->flash('success', 'Successfully updated !');
        return redirect()->route('dashboard.apartments.index', ['projectId' => $apartment->project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $apartment = Apartment::find($id);
        if(!$apartment){
            abort(404);
        }
        Storage::disk('public')->delete('images/' . $apartment->project_id . '/' . $apartment->img);
        $apartment->delete();

        $project = Project::find($apartment->project_id);
        LogSystem::warning('تم حذف ' . $apartment->type . ' بنجاح - اسم المشروع: ' . $project->name);

       session()->flash('success', 'Successfully deleted !');
        return redirect()->route('dashboard.apartments.index', ['projectId' => $apartment->project_id]);
    }

    public function removeImage($id)
    {
        $apartmentImage = ApartmentImage::findOrFail($id);

        // Remove the image file
        $imagePath = 'uploads/images/apartments/' . $apartmentImage->apartment_id . '/' . $apartmentImage->img;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Remove the image entry from the database
        $apartmentImage->delete();

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
