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
            'who_are_we' => ['required'],
            'message' => ['required'],
            'vision' => ['required'],
            'values' => ['required'],
            'goals' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $about =  About::find(1);
        if (is_null($about)) {
            $about = new About();
        }

        $about->goals = $validatedData['goals'];
        $about->values = $validatedData['values'];
        $about->who_are_we = $validatedData['who_are_we'];
        $about->message = $validatedData['message'];
        $about->vision = $validatedData['vision'];
        $about->save();
        session()->flash('success', 'About Updated Successfully');
        return redirect()->back();
    }
}
