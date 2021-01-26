<?php

namespace App\Http\Controllers;

use App\Models\CollectionDetail;
use Illuminate\Support\Facades\Validator;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collectionDetail =CollectionDetail::with('collection')->orderBy('id', 'DESC')->get();
        return view('pages.Collection.collection-images', compact('collectionDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $collections = Collection::OrderBy('id', 'DESC')->get();
        return view('pages.Collection.add-collection-images',compact('collections'));
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
        $validator = Validator::make($request->all(),[
            'collection' => 'required',
            'collection_image_list.*' => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else
        {

            $images = $request->file('collection_image_list');
            for($i = 0; $i < count($images); $i++)
            {
                $new_name = rand() . '.' . $images[$i]->getClientOriginalExtension();
                $images[$i]->move(public_path('collection-imgs-list'), $new_name);
                $img[] =  env('APP_URL').'collection-imgs-list/'.$new_name;
            }

            $data = new CollectionDetail;
            $data->collection_id = $request->collection;
            $data->collection_images_list = json_encode($img);
            $data->save();
            $request->session()->flash('message', 'Collection image add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CollectionDetail  $collectionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CollectionDetail $collectionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollectionDetail  $collectionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CollectionDetail $collectionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollectionDetail  $collectionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CollectionDetail $collectionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollectionDetail  $collectionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, CollectionDetail $collectionDetail)
    {
        //
        $check = CollectionDetail::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Collection image remove successfully.');
            return redirect()->back();
        }
    }
}
