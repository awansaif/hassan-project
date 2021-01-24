<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collections = Collection::orderBy('id', 'DESC')->get();
        return view('pages.Collection.main', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.Collection.add-collection');
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
            'collection_name' => 'required',
            'collection_image' => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else
        {
            $images = $request->file('collection_image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('collection-imgs'), $new_name);
            $img =  env('APP_URL').'collection-imgs/'.$new_name;
            $data = new Collection;
            $data->collection_name = $request->collection_name;
            $data->collection_image = $img;
            $data->save();
            $request->session()->flash('message', 'Collection add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Collection $collection)
    {
        //
        $data = Collection::Where('id', $request->id)->first();
        return view('pages.Collection.edit-collection',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
        $validator = Validator::make($request->all(),[
            'collection_name' => 'required',
            'collection_image' => 'nullable|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else
        {
            if($request->file('collection_image'))
            {
                $images = $request->file('collection_image');
                $new_name = rand() . '.' . $images->getClientOriginalExtension();
                $images->move(public_path('collection-imgs'), $new_name);
                $img =  env('APP_URL').'collection-imgs/'.$new_name;
                $update  = Collection::where('id', $request->collection_id)->update([
                    'collection_name' => $request->collection_name,
                    'collection_image' =>  $img,
                ]);
                $request->session()->flash('message', 'Collection update successfully.');
                return redirect()->back();
            }
            else{
                $update  = Collection::where('id', $request->collection_id)->update([
                    'collection_name' => $request->collection_name,
                ]);
                $request->session()->flash('message', 'Collection update successfully.');
                return redirect()->back();
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Collection $collection)
    {
        //
        $check = Collection::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Collection remove successfully.');
            return redirect()->back();
        }
    }
}
