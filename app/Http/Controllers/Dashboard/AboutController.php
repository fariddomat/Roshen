<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

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

        if ($request->who_are_we_image) {
            Storage::disk('public')->delete('about/' . $about->who_are_we_image);
            $who_are_we_image = Image::make($request->who_are_we_image)
                ->resize(1200, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp', 90);

            Storage::disk('public')->put('about/' . $request->who_are_we_image->hashName(), (string)$who_are_we_image, 'public');
            $about->update([
                'who_are_we_image' => $request->who_are_we_image->hashName()
            ]);
        }

        $about->save();
        session()->flash('success', 'About Updated Successfully');
        return redirect()->back();
    }
}
