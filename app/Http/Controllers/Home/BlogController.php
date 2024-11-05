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
        $query = Blog::orderBy('created_at');

        // تصفية المقالات بناءً على الفئة إذا تم تحديدها
        if ($request->has('category')) {
            $query->where('blog_category_id', $request->category);
        }

        $blogs = $query->paginate(4);
        $blogCategories = BlogCategory::all();

        return view('home.blogs', compact('blogs', 'blogCategories'));
    }

    public function category($slug)
    {
        // Find the category by slug
        $category = BlogCategory::where('slug', $slug)->first();

        // Check if the category exists
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Get blogs that belong to the found category
        $blogs = Blog::where('blog_category_id', $category->id)
                     ->orderBy('created_at', 'desc')
                     ->paginate(16);

        $blogCategories = BlogCategory::all();

        return view('home.blogsCategory', compact('blogs', 'blogCategories', 'category'));
    }


    public function show($slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        if ($blog) {

            return view('home.blog', compact('blog'));
        } else {
            # code...
            abort(404);
        }
    }
}
