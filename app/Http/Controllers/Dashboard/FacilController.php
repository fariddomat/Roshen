<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Facil;
use Illuminate\Http\Request;

class FacilController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $facils = Facil::all();
        return view('dashboard.facils.index', compact('facils'));
    }

    public function create()
    {
        return view('dashboard.facils.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'icon' => 'required|image',
            'value' => 'required',
        ]);
        $data = $request->except('icon');

        $helper = new ImageHelper;
        $image = $request->file('icon');
        $directory = '/photos/facils';
        $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
        $data['icon'] = $fullPath;

        Facil::create($data);
        session()->flash('success', 'Facil Added Successfully');
        return redirect()->route('dashboard.facils.index');
    }
    public function edit(Facil $facil)
    {
        return view('dashboard.facils.edit', compact('facil'));
    }

    public function update(Request $request, Facil $facil)
    {

        $request->validate([
            'name' => 'required',
            'icon' => 'required|image',
            'value' => 'required',
        ]);
        $data = $request->except('icon');
        if ($request->has('icon')) {

            $helper = new ImageHelper;
            $image = $request->file('icon');
            $directory = '/photos/facils';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
            $data['icon'] = $fullPath;
        }
        $facil->update($data);
        session()->flash('success', 'Facil Updated Successfully');
        return redirect()->route('dashboard.facils.index');
    }
    public function destroy(Facil $facil)
    {
        $facil->delete();
        session()->flash('success', 'Facil Deleted Successfully');
        return redirect()->route('dashboard.facils.index');
    }
}
