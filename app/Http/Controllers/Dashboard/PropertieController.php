<?php

namespace App\Http\Controllers\Dashboard;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Propertie;

class PropertieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\Response
     */
    public function show(Propertie $propertie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\Response
     */
    public function edit(Propertie $propertie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propertie $propertie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propertie $propertie)
    {
        //
    }
}
