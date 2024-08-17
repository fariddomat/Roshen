<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Partners;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $partners = Partners::all();
        // dd($partners);
        return view('dashboard.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.partners.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'img' => 'required',
        ]);

        $partner = new Partners();
        $helper = new ImageHelper;
        $image = $request->file('img');
        $directory = '/photos/partners';
        $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
        $partner->img = $fullPath;

        $partner->save();
        session()->flash('success', 'Partners Added Successfully');
        return redirect()->route('dashboard.partners.index');
    }
    public function edit(Partners $partner)
    {
        return view('dashboard.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partners $partner)
    {

        $request->validate([
            'img' => 'required',
        ]);
        $helper = new ImageHelper;
        if ($request->has('img')) {

            $helper->removeImageInPublicDirectory($partner->img);
            $image = $request->file('img');
            $directory = '/photos/partners';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
            $partner->img = $fullPath;
        }
        $partner->save();
        session()->flash('success', 'Partners Updated Successfully');
        return redirect()->route('dashboard.partners.index');
    }
    public function destroy(Partners $partner)
    {
        $partner->delete();
        session()->flash('success', 'Partners Deleted Successfully');
        return redirect()->route('dashboard.partners.index');
    }
}
