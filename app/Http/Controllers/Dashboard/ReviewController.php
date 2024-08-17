<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LogSystem;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ReviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::paginate(20);
        return view('dashboard.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.reviews.create');
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
            'name' => 'required|unique:reviews,name',
            'description' => 'required',
            'title' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',

        ]);

        $request_data = $request->except(['img']);

        $img = Image::make($request->img)
            ->encode('webp', 90);

        Storage::disk('public')->put('images/' . $request->img->hashName(), (string)$img, 'public');
        $request_data['img'] = $request->img->hashName();

        Review::create($request_data);
        LogSystem::success('تم إضافة التقييم جديد بنجاح : ' . $request->name);
        session()->flash('success', 'Successfully Created !');
        return redirect()->route('dashboard.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review=Review::find($id);
        if(!$review){
            abort(404);
        }
        return view('dashboard.reviews.edit',compact('review'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:reviews,name,' . $id,
            'description' => 'required',
            'title' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',

        ]);

        $review=Review::find($id);
        $request_data = $request->except(['img']);
        if ($request->img) {
            Storage::disk('public')->delete('images/' . $review->img);

            $img = Image::make($request->img)
                ->encode('webp', 90);

            Storage::disk('public')->put('images/' . $request->img->hashName(), (string)$img, 'public');
            $request_data['img'] = $request->img->hashName();

        }

        $review->update($request_data);
        LogSystem::info('تم تعديل التقييم بنجاح : ' . $request->name);

        session()->flash('success','Successfully updated !');
        return redirect()->route('dashboard.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review=Review::find($id);
        if(!$review){
            abort(404);
        }
        Storage::disk('public')->delete('images/' . $review->img);
        $review->delete();
        LogSystem::info('تم حذف التقييم بنجاح : ' . $review->name);
        session()->flash('success','Successfully deleted !');
        return redirect()->route('dashboard.reviews.index');
    }
}
