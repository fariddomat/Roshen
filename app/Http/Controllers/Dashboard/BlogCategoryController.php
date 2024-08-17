<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadministrator|blogger']);
    }

    public function index()
    {
        $blogCategories = BlogCategory::orderBy('id', 'asc')->get();
        return view('dashboard.blogcategories.index', compact('blogCategories'));
    }

    public function create()
    {
        return view('dashboard.blogcategories.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $blogCategory = new BlogCategory();
        $blogCategory->name = $validatedData['name'];



        $blogCategory->save();
        session()->flash('success', 'Blog Category Added Successfully');
        return redirect()->route('dashboard.blogcategories.index');
    }
    public function edit(BlogCategory $blogcategory)
    {
        return view('dashboard.blogcategories.edit', compact('blogcategory'));
    }

    public function update(Request $request, BlogCategory $blogcategory)
    {
        $rules = [
            'name' => ['required'],
        ];
        $validatedData = $request->validate($rules);

        $blogcategory->name = $validatedData['name'];

        $blogcategory->save();
        session()->flash('success', 'Blog Category Updated Successfully');
        return redirect()->route('dashboard.blogcategories.index');
    }




}
