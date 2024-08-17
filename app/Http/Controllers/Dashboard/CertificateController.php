<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:superadministrator']);
    }

    public function index()
    {
        $certs = Certificate::all();
        // dd($certs);
        return view('dashboard.certs.index', compact('certs'));
    }

    public function create()
    {
        return view('dashboard.certs.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'img' => 'required',
        ]);

        $cert = new Certificate();
        $helper = new ImageHelper;
        $image = $request->file('img');
        $directory = '/photos/certs';
        $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
        $cert->img = $fullPath;

        $cert->save();
        session()->flash('success', 'Certificate Added Successfully');
        return redirect()->route('dashboard.certs.index');
    }
    public function edit(Certificate $cert)
    {
        return view('dashboard.certs.edit', compact('cert'));
    }

    public function update(Request $request, Certificate $cert)
    {

        $request->validate([
            'img' => 'required',
        ]);
        $helper = new ImageHelper;
        if ($request->has('img')) {

            $helper->removeImageInPublicDirectory($cert->img);
            $image = $request->file('img');
            $directory = '/photos/certs';
            $fullPath = $helper->storeImageInPublicDirectory($image, $directory);
            $cert->img = $fullPath;
        }
        $cert->save();
        session()->flash('success', 'Certificate Updated Successfully');
        return redirect()->route('dashboard.certs.index');
    }
    public function destroy(Certificate $cert)
    {
        $cert->delete();
        session()->flash('success', 'Certificate Deleted Successfully');
        return redirect()->route('dashboard.certs.index');
    }
}
