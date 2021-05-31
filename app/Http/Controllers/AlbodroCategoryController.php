<?php

namespace App\Http\Controllers;

use App\Models\AlbodroCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAlbodroCategoryRequest;
use App\Models\AlbodroItem;
use App\Models\FederationMovement;
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
        return view('pages.AlbodroCategory.main')->with([
            'all' => AlbodroCategory::with('federations')->orderBy('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.AlbodroCategory.add')->with([
            'federations' => FederationMovement::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token', 'tags']);

        $destinationPath = 'albodro-category-images/';
        $image = $request->file('image');
        $file_name = time() . $image->getClientOriginalName();
        $data['image'] = $image->move($destinationPath, $file_name);
        $data['image'] = env('APP_URL') . $destinationPath . $file_name;

        $created = AlbodroCategory::create($data);
        return redirect()->back()->with(['message' => 'Albodoro Category Created Successfully']);
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
        return view('pages.AlbodroCategory.edit')->with([
            'data' => $albodroCategory,
            'federations' => FederationMovement::all()
        ]);
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
        $data = $request->except(['_token', '_method']);

        if ($request->file('image')) {
            $destinationPath = 'albodro-category-images/';
            $image = $request->file('image');
            $file_name = time() . $image->getClientOriginalName();
            $image->move($destinationPath, $file_name);
            $data['image'] = env('APP_URL') . $destinationPath . $file_name;
        }

        $albodroCategory->update($data);
        return redirect()->back()->with(['message' => 'Albodoro Category Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlbodroCategory  $albodroCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AlbodroCategory::destroy($id);
        AlbodroItem::where('albodro_id', $id)->delete();
        return redirect()->back()->with(['message' => 'Albodoro Category deletd successfully']);
    }
}
