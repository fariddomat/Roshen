<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Terms;
use Illuminate\Http\Request;

class TermController extends Controller
{

    public function index()
    {
        $terms = Terms::orderBy('id')->get();
        return view('dashboard.terms.index', compact('terms'));
    }

    public function create()
    {
        return view('dashboard.terms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        Terms::create($request->all());

        return redirect()->route('dashboard.terms.index')
            ->with('success', 'Terms policy created successfully');
    }

    public function show(Terms $term)
    {
        return view('dashboard.terms.show', compact('term'));
    }

    public function edit(Terms $term)
    {
        return view('dashboard.terms.edit', compact('term'));
    }

    public function update(Request $request, Terms $term)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $term->update($request->all());

        return redirect()->route('dashboard.terms.index')
            ->with('success', 'Terms policy updated successfully');
    }

    public function destroy(Terms $term)
    {
        $term->delete();

        return redirect()->route('dashboard.terms.index')
            ->with('success', 'Terms policy deleted successfully');
    }
}
