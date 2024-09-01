<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LogSystem;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator|Manager']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('name', 'asc')->whenSearch(request()->search)
            ->paginate(20);
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
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
            'name' => 'required|unique:services,name',
            'description' => 'required',
            'icon' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',

        ]);

        $request_data = $request->except(['img']);

        $img = Image::make($request->img)
            ->encode('webp', 90);

        Storage::disk('public')->put('images/' . $request->img->hashName(), (string)$img, 'public');
        $request_data['img'] = $request->img->hashName();

        Service::create($request_data);
        LogSystem::success('تم إضافة الخدمة جديد بنجاح : ' . $request->name);
        session()->flash('success', 'Successfully Created !');
        return redirect()->route('dashboard.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service=Service::find($id);
        if(!$service){
            abort(404);
        }
        return view('dashboard.services.edit',compact('service'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:services,name,' . $id,
            'description' => 'required',
            'icon' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',

        ]);

        $service=Service::find($id);
        $request_data = $request->except(['img']);
        if ($request->img) {
            Storage::disk('public')->delete('images/' . $service->img);

            $img = Image::make($request->img)
                ->encode('webp', 90);

            Storage::disk('public')->put('images/' . $request->img->hashName(), (string)$img, 'public');
            $request_data['img'] = $request->img->hashName();

        }

        $service->update($request_data);
        LogSystem::info('تم تعديل الخدمة بنجاح : ' . $request->name);

        session()->flash('success','Successfully updated !');
        return redirect()->route('dashboard.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        if(!$service){
            abort(404);
        }
        Storage::disk('public')->delete('images/' . $service->img);
        $service->delete();
        LogSystem::info('تم حذف الخدمة بنجاح : ' . $service->name);
        session()->flash('success','Successfully deleted !');
        return redirect()->route('dashboard.services.index');
    }
}
