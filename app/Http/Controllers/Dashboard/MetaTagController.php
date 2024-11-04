<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MetaTag;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
     // Display a listing of meta tags
     public function index()
     {
         $metaTags = MetaTag::all();
         return view('dashboard.meta_tags.index', compact('metaTags'));
     }

     // Show the form for creating a new meta tag
     public function create()
     {
         return view('dashboard.meta_tags.create');
     }

     // Store a newly created meta tag in storage
     public function store(Request $request)
     {
         $request->validate([
             'page_route' => 'required|unique:meta_tags',
             'meta_title' => 'required',
             'meta_description' => 'required',
         ]);

         MetaTag::create($request->all());

         return redirect()->route('dashboard.meta-tags.index')
             ->with('success', 'Meta tag created successfully.');
     }

     // Show the form for editing a meta tag
     public function edit($id)
     {
         $metaTag = MetaTag::findOrFail($id);
         return view('dashboard.meta_tags.edit', compact('metaTag'));
     }

     // Update the specified meta tag in storage
     public function update(Request $request, $id)
     {
         $request->validate([
             'page_route' => 'required|unique:meta_tags,page_route,' . $id,
             'meta_title' => 'required',
             'meta_description' => 'required',
         ]);

         $metaTag = MetaTag::findOrFail($id);
         $metaTag->update($request->all());

         return redirect()->route('dashboard.meta-tags.index')
             ->with('success', 'Meta tag updated successfully.');
     }

     // Remove the specified meta tag from storage
     public function destroy($id)
     {
         MetaTag::findOrFail($id)->delete();
         return redirect()->route('dashboard.meta-tags.index')
             ->with('success', 'Meta tag deleted successfully.');
     }
}
