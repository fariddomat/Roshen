<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectControlelr extends Controller
{
    //
    public function index(Request $request)
    {
        $category = (object)[
            'name' => 'كل التصنيفات'
        ];
        // dd($category->name);
        $projects = Project::orderBy('created_at')->paginate(6);
        return view('home.category', compact('category', 'projects'));
    }

    public function show($id)
    {

        $project = Project::find($id);

        if ($project) {
            if ($project->status == 'غير متاح للعرض') {
                abort(404);
            }

            $category_list = Category::all();
            $max_price = Apartment::max('price');
            $max_room_count = Apartment::max('room_count');
            $max_area = Apartment::max('area');

            $projects= Project::where('category_id', $project->category_id)->where('id', '<>', $id)->limit(6)->get();
            return view('home.project', compact('project', 'category_list', 'max_price', 'max_room_count', 'max_area', 'projects'));
        } else {
            # code...
            abort(404);
        }
    }
}
