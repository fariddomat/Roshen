<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ServiceReview;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ServiceReviewController extends Controller
{
    public function index()
    {
        $reviews = ServiceReview::with('service')->paginate(20);
        return view('dashboard.service_reviews.index', compact('reviews'));
    }

    public function create()
    {
        $services = Service::all();
        return view('dashboard.service_reviews.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|unique:service_reviews,name',
            'title' => 'required',
            'description' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $data = $request->except('img');

        if ($request->hasFile('img')) {
            $img = Image::make($request->img)->encode('webp', 90);
            Storage::disk('public')->put('images/' . $request->img->hashName(), (string) $img);
            $data['img'] = $request->img->hashName();
        }

        ServiceReview::create($data);
        session()->flash('success', 'Review created successfully!');
        return redirect()->route('dashboard.service_reviews.index');
    }

    public function edit(ServiceReview $serviceReview)
    {
        $services = Service::all();
        return view('dashboard.service_reviews.edit', compact('serviceReview', 'services'));
    }

    public function update(Request $request, ServiceReview $serviceReview)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|unique:service_reviews,name,' . $serviceReview->id,
            'title' => 'required',
            'description' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $data = $request->except('img');

        if ($request->hasFile('img')) {
            Storage::disk('public')->delete('images/' . $serviceReview->img);

            $img = Image::make($request->img)->encode('webp', 90);
            Storage::disk('public')->put('images/' . $request->img->hashName(), (string) $img);
            $data['img'] = $request->img->hashName();
        }

        $serviceReview->update($data);
        session()->flash('success', 'Review updated successfully!');
        return redirect()->route('dashboard.service_reviews.index');
    }

    public function destroy(ServiceReview $serviceReview)
    {
        Storage::disk('public')->delete('images/' . $serviceReview->img);
        $serviceReview->delete();

        session()->flash('success', 'Review deleted successfully!');
        return redirect()->route('dashboard.service_reviews.index');
    }
}
