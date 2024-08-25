<?php


namespace App\Http\Controllers\Dashboard;

use Mail;
use App\Models\Apartment;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Facility;
use App\Models\LogSystem;
use App\Models\ProjectImage;
use App\Promoter;
use App\Models\Propertie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('sort_id', 'asc')->whenSearch(request()->search)
            ->paginate(30);
        return view('dashboard.projects.index', compact('projects'));
    }

    public function clone($id)
    {
        $project = Project::findOrFail($id);
        $project->load('apartments', 'floors', 'propertie', 'facility', 'projectImages');

        // replicate() will take care of those
        $clone = $project->replicate();

        $clone->push();

        // Copy the apartments
        foreach ($project->apartments as $apartment) {
            $cloneApartment = $apartment->replicate();
            $clone->apartments()->save($cloneApartment);
        }

        // Copy the floors
        // foreach ($project->floors as $floor) {
        //     $cloneFloor = $floor->replicate();
        //     $clone->floors()->save($cloneFloor);
        // }

        // Copy the images
        foreach ($project->projectImages as $projectImage) {
            $cloneProjectImage = $projectImage->replicate();
            $clone->projectImages()->save($cloneProjectImage);
        }


        // Copy the property
        if ($project->propertie) {
            $cloneProperty = $project->propertie->replicate();
            $clone->propertie()->save($cloneProperty);
        }

        // Copy the facility
        if ($project->facility) {
            $cloneFacility = $project->facility->replicate();
            $clone->facility()->save($cloneFacility);
        }


        $sourcePath = '/home/alqolzct/public_html/uploads/images/' . $project->id; // Path to the source folder
        $destinationPath = '/home/alqolzct/public_html/uploads/images/' . $clone->id; // Path to the destination folder

        // Copy the directory to the destination folder
        File::copyDirectory($sourcePath, $destinationPath);
        LogSystem::success('تم نسخ مشروع  بنجاح - اسم المشروع: ' . $project->name);

        session()->flash('success', 'Successfully Cloned !');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.projects.create', compact('categories'));
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
            'category' => 'required',
            'name' => 'required|unique:projects,name',
            'date_of_build' => 'required',
            'address' => 'required',
            'scheme_name' => 'required',
            'status' => 'required',
            'status_percent' => 'required|numeric|min:0|max:100',
            'floors_count' => 'required|numeric|min:1',
            // 'floor_apartments_count' => 'required|numeric|min:2|max:4',

            // 'appendix_count' => 'required|numeric|min:0|default',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'img' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',

            'pdfs.*' => 'nullable|mimes:pdf',

            'pdetails' => 'required',

        ]);
        try {

            $percent = 100;
            if ($request->status != 'complete') {
                $percent = $request->status_percent;
            }
            $project = Project::create([
                'category_id' => $request->category,
                'name' => $request->name,
                'date_of_build' => $request->date_of_build,
                'address' => $request->address,
                'address_location' => $request->address_location,
                'virtual_location' => $request->virtual_location,
                'scheme_name' => $request->scheme_name,
                'status' => $request->status,
                'status_percent' => $percent,
                'floors_count' => $request->floors_count,
                // 'floor_apartments_count' =>$request->floor_apartments_count,
                // 'apartments_count' => $request->floors_count * $request->floor_apartments_count,
                // 'appendix_count' => '2',
                // 'appendix_count' => $request->appendix_count,
                'details' => $request->details,
                'img' => $request->poster->hashName(),
                'cover_img' => $request->cover_img->hashName()
            ]);
            $poster = Image::make($request->poster)
                ->resize(538, 720)->encode('webp', 90);

            Storage::disk('public')->put('images/' . $project->id . '/'  . $request->poster->hashName(), (string)$poster, 'public');


            $cover_img = Image::make($request->cover_img)
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp', 90);

            Storage::disk('public')->put('images/' . $project->id . '/'  . $request->cover_img->hashName(), (string)$cover_img, 'public');

            foreach ($request->file('img') as $file) {

                $img = Image::make($file)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('webp', 90);

                Storage::disk('public')->put('images/' . $project->id . '/' . $file->hashName(), (string)$img, 'public');

                ProjectImage::create([
                    'project_id' => $project->id,
                    'img' => $file->hashName()
                ]);
            }

            if ($request->hasFile('pdfs')) {
                foreach ($request->file('pdfs') as $file) {
                    $path = $file->store('images/' . $project->id . '/pdfs', 'public');

                    $project->pdfs()->create([
                        'name' => $file->getClientOriginalName(),
                        'file_path' => $path,
                    ]);
                }
            }


            // propertie

            $propertie = Propertie::create([
                'project_id' => $project->id,
                'details' => $request->pdetails,
            ]);



            LogSystem::success('تم إضافة مشروع جديد بنجاح - اسم المشروع: ' . $request->name);

            session()->flash('success', 'Successfully Created !');
            return redirect()->route('dashboard.apartments.index', ['projectId' => $project->id]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withInput($request->input())->withErrors(['msg' => $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }
        $categories = Category::all();
        return view('dashboard.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'category' => 'required',
            'name' => 'required|unique:projects,name,' . $id,
            'date_of_build' => 'required',
            'address' => 'required',
            'scheme_name' => 'required',
            // 'floors_count' => 'required|numeric|min:1',
            // 'floor_apartments_count' => 'required|numeric|min:2|max:4',

            // 'appendix_count' => 'required|numeric|min:0',
            'status' => 'required',
            'status_percent' => 'required|numeric|min:0|max:100',


            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'cover_img' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            // 'img' => 'required',
            'img.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',


            'pdfs.*' => 'nullable|mimes:pdf',
            'pdetails' => 'required',

        ]);

        try {




            $project = Project::find($id);

            if ($request->poster) {
                Storage::disk('public')->delete('images/' . $project->id . '/' . $project->img);
                $poster = Image::make($request->poster)
                    ->resize(538, 720)->encode('webp', 90);

                Storage::disk('public')->put('images/' . $project->id . '/' . $request->poster->hashName(), (string)$poster, 'public');
                $project->update([
                    'img' => $request->poster->hashName()
                ]);
            }


            if ($request->cover_img) {
                Storage::disk('public')->delete('images/' . $project->id . '/' . $project->cover_img);
                $cover_img = Image::make($request->cover_img)
                    ->resize(1200, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('webp', 90);

                Storage::disk('public')->put('images/' . $project->id . '/' . $request->cover_img->hashName(), (string)$cover_img, 'public');
                $project->update([
                    'cover_img' => $request->cover_img->hashName()
                ]);
            }

            if ($request->img) {

                $projectImages = ProjectImage::where('project_id', $project->id);
                // dd($projectImages);
                // foreach ($projectImages->get() as $key => $item) {
                //     // dd($item->img);
                //     Storage::disk('public')->delete('images/' . $project->id . '/' . $item->img);
                // }
                // $projectImages->delete();
                foreach ($request->file('img') as $file) {
                    // dd(true);
                    $img = Image::make($file)
                        ->resize(null, 800, function ($constraint) {
                            $constraint->aspectRatio();
                        })->encode('webp', 90);

                    Storage::disk('public')->put('images/' . $project->id . '/' . $file->hashName(), (string)$img, 'public');

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'img' => $file->hashName()
                    ]);
                }
            }


            if ($request->hasFile('pdfs')) {
                // Delete old PDFs
                foreach ($project->pdfs as $key => $pdf) {
                    Storage::disk('public')->delete($pdf->file_path);
                }
                $project->pdfs()->delete();
                foreach ($request->file('pdfs') as $file) {
                    $path = $file->store('images/' . $project->id . '/pdfs', 'public');

                    $project->pdfs()->create([
                        'name' => $file->getClientOriginalName(),
                        'file_path' => $path,
                    ]);
                }
            }

            $percent = 100;
            if ($request->status != 'complete') {
                $percent = $request->status_percent;
            }
            $project->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'date_of_build' => $request->date_of_build,
                'address' => $request->address,
                'address_location' => $request->address_location,
                'virtual_location' => $request->virtual_location,
                'scheme_name' => $request->scheme_name,
                'status' => $request->status,
                'status_percent' => $percent,
                'floors_count' => $request->floors_count,
                // 'floor_apartments_count' =>$request->floor_apartments_count,
                // 'apartments_count' => $request->floors_count * $request->floor_apartments_count,
                // 'appendix_count' => $request->appendix_count,
                'details' => $request->details,
            ]);

            // prpertie

            $propertie = Propertie::where('project_id', $project->id);
            $propertie->update([
                'details' => $request->pdetails,
            ]);

            // facility

            LogSystem::info('تم تعديل مشروع - اسم المشروع: ' . $project->name);

            session()->flash('success', 'Successfully updated !');
            return redirect()->route('dashboard.projects.index');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->withInput($request->input())->withErrors(['msg' => $th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404);
        }
        $facility = Facility::where('project_id', $project->id);
        $facility->delete();
        $propertie = Propertie::where('project_id', $project->id);
        $propertie->delete();
        $apartments = Apartment::where('project_id', $project->id);
        $apartments->delete();
        $projectImages = ProjectImage::where('project_id', $project->id);
        // dd($projectImages);
        foreach ($projectImages->get() as $key => $item) {
            // dd($item->img);
            Storage::disk('public')->delete('images/' . $project->id . '/' . $item->img);
        }
        $projectImages->delete();
        Storage::disk('public')->delete('images/' . $project->id . '/' . $project->img);
        $project->delete();

        LogSystem::warning('تم حذف المشروع - اسم المشروع: ' . $project->name);

        session()->flash('success', 'Successfully deleted !');
        return redirect()->route('dashboard.projects.index');
    }

    public function sort(Request $request)
    {
        // dd($request->order);
        $projects = Project::all();
        foreach ($projects as $project) {
            foreach ($request->order as $order) {
                if ($order['id'] == $project->id) {
                    $project->update(['sort_id' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }

    public function deletePdf($id)
    {
        $project = Project::findOrFail($id);
        foreach ($project->pdfs as $key => $pdf) {
            Storage::disk('public')->delete($pdf->file_path);
        }
        $project->pdfs()->delete();

        session()->flash('success', 'Successfully PDF deleted !');
        return redirect()->back();
    }

    public function removeImage($id)
    {
        $projectImage = ProjectImage::findOrFail($id);

        // Remove the image file
        $imagePath = 'uploads/images/' . $projectImage->project_id . '/' . $projectImage->img;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }

        // Remove the image entry from the database
        $projectImage->delete();

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح');
    }
}
