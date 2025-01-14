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
        $query = Blog::query();

        // Apply sorting
        if ($request->sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($request->sort == 'latest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('blog_category_id', $request->category);
        }

        $blogs = $query->paginate(8);
        $blogCategories = BlogCategory::all();

        return view('home.blogs', compact('blogs', 'blogCategories'));
    }


    public function category(Request $request, $slug)
    {
        // Find the category by slug
        $category = BlogCategory::where('slug', $slug)->first();

        // Check if the category exists
        if (!$category) {
            abort(404, 'Category not found');
        }

        // Get blogs that belong to the found category
        $query = Blog::where('blog_category_id', $category->id);
        if ($request->sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } elseif ($request->sort == 'latest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }


        $blogs = $query->paginate(16);
        $blogCategories = BlogCategory::all();

        return view('home.blogsCategory', compact('blogs', 'blogCategories', 'category'));
    }


    public function show($slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        if ($blog) {

            // Get related blogs from the same category, excluding the current blog, limit to 5
            $relatedBlogs = Blog::where('blog_category_id', $blog->blog_category_id)
                ->where('id', '!=', $blog->id)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();
            return view('home.blog', compact('blog', 'relatedBlogs'));
        } else {
            # code...
            abort(404);
        }
    }
}
