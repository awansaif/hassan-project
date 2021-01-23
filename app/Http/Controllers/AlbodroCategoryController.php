<?php

namespace App\Http\Controllers;

use App\Models\AlbodroCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAlbodroCategoryRequest;
use Illuminate\Http\Request;

class AlbodroCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.AlbodroCategory.main')->with(['all' => AlbodroCategory::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.AlbodroCategory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAlbodroCategoryRequest $request)
    {
        if($request->fails()){
            return redirect()->back()->withErrors($request)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlbodroCategory  $albodroCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AlbodroCategory $albodroCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlbodroCategory  $albodroCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AlbodroCategory $albodroCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlbodroCategory  $albodroCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlbodroCategory $albodroCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlbodroCategory  $albodroCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlbodroCategory $albodroCategory)
    {
        //
    }
}
