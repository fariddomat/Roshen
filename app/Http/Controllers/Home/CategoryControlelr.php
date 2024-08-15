<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Project;
use Illuminate\Http\Request;

class CategoryControlelr extends Controller
{
    //
    public function index()
    {

        $categories=Category::paginate(6);
        $category_list=Category::all();
        $max_price=Apartment::max('price');
        $max_room_count=Apartment::max('room_count');
        $max_area=Apartment::max('area');
        return view('home.categories', compact('categories', 'category_list', 'max_price', 'max_room_count', 'max_area'));
    }

   public function show(Request $request, $id)
   {
    if ($request->category_id) {
        $id=$request->category_id;
    }
    $category=Category::find($id);
    if ($category || $id == 1) {

        $category_list=Category::all();
        $max_price=Apartment::max('price');
        $max_room_count=Apartment::max('room_count');
        $max_area=Apartment::max('area');
        // dd($request->price);
        if($id!=1){
            $projects=Project::where('category_id',$id)
            ->whenPrice(request()->price)
            ->whenRoom(request()->room_count)
            ->whenArea(request()->area)
            ->orderBy('sort_id', 'asc')
            ->paginate(6);
        }else{
            $projects=Project::whenPrice(request()->price)
            ->whenRoom(request()->room_count)
            ->whenArea(request()->area)
            ->orderBy('sort_id', 'asc')
            ->paginate(6);
        }
    return view('home.category',compact('category','projects',  'category_list', 'max_price', 'max_room_count', 'max_area'));

    } else {
        # code...
        abort(404);
    }

   }
}
