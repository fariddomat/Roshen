<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function create()
    {
        $about = About::first();
        return view('dashboard.about.create', compact('about'));
    }

    public function store(Request $request)
    {
        $rules = [
            'quality_safty' => ['required'],
            'who' => ['required'],
            'message' => ['required'],
            'vision' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $about =  About::find(1);
        if (is_null($about)) {
            $about = new About();
        }

        $about->quality_safty = $validatedData['quality_safty'];
        $about->who_are_we = $validatedData['who'];
        $about->message = $validatedData['message'];
        $about->vision = $validatedData['vision'];
        $about->save();
        session()->flash('success', 'About Updated Successfully');
        return redirect()->back();
    }
}
