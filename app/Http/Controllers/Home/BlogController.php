<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    //
    public function index(Request $request)
    {

        $blogs = Blog::orderBy('created_at')->paginate(4);
        $blogCategories = BlogCategory::all();
        return view('home.blogs', compact('blogs', 'blogCategories'));
    }

    public function show($id)
    {

        $blog = Blog::find($id);

        if ($blog) {

            return view('home.blog', compact('blog'));
        } else {
            # code...
            abort(404);
        }
    }
}
