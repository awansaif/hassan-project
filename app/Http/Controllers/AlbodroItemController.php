<?php

namespace App\Http\Controllers;

use App\Models\AlbodroItem;
use App\Http\Controllers\Controller;
use App\Models\AlbodroCategory;
use Illuminate\Http\Request;

class AlbodroItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('pages.AlbodroItem.main')->with([
        //     'all' => AlbodroItem::orderBy('id', 'DESC')->get(),
        //     ]);
    }

    public function categoryItems(Request $request)
    {
        return view('pages.AlbodroItems.main')->with([
            'all' => AlbodroItem::with('category')->where('albodro_id', $request->id)->orderBy('id', 'DESC')->get(),
            'cat' => AlbodroCategory::where('id', $request->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.AlbodroItems.add')->with('categories', AlbodroCategory::all());
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

        $destinationPath = 'albodro-item-images/';
        $image = $request->file('image');
        $file_name = time().$image->getClientOriginalName();
        $data['image'] = $image->move($destinationPath,$file_name);
        $data['image'] = env('APP_URL').$destinationPath.$file_name;

        $created = AlbodroItem::create($data);
        return redirect()->back()->with(['message' => 'Item Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlbodroItem  $albodroItem
     * @return \Illuminate\Http\Response
     */
    public function show(AlbodroItem $albodroItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlbodroItem  $albodroItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AlbodroItem $albodroItem)
    {
        return view('pages.AlbodroItems.edit')->with([
            'data' => $albodroItem,
            'cat' => AlbodroCategory::where('id', $albodroItem->albodro_id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AlbodroItem  $albodroItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AlbodroItem $albodroItem)
    {
        $data = $request->except(['_token','_method']);

        if($request->file('image')){
            $destinationPath = env('APP_URL').'albodro-item-images/';
            $image = $request->file('image');
            $file_name = time().$image->getClientOriginalName();
            $data['image'] = $image->move($destinationPath,$file_name);
        }

        $albodroItem->update($data);
        return redirect()->back()->with(['message' => 'Item Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlbodroItem  $albodroItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AlbodroItem::destroy($id);
        return redirect()->back()->with(['message' => 'Item deletd successfully']);
    }
}
