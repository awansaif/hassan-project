<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Links.index', [
            'links' => Link::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail'  => 'required|image',
            'link'       => 'required|url',
            'price'      => 'required'
        ]);

        $destination = 'link-thumbnail/';
        $thumbnail = $request->File('thumbnail');
        $thumbnail_new_name = time() . $thumbnail->getClientOriginalName();
        $thumbnail->move($destination, $thumbnail_new_name);

        Link::create([
            'title' => $request->title,
            'thumbnail' => env('APP_URL') . $destination . $thumbnail_new_name,
            'link'      => $request->link,
            'price'     => $request->price,
        ]);

        $request->session()->flash('message', 'Link added successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        return view('pages.Links.edit', [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $this->validate($request, [
            'title' => 'required',
            'thumbnail'  => 'nullable|image',
            'link'       => 'required|url',
            'price'      => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {

            $destination = 'link-thumbnail/';
            $thumbnail = $request->File('thumbnail');
            $thumbnail_new_name = time() . $thumbnail->getClientOriginalName();
            $thumbnail->move($destination, $thumbnail_new_name);

            $link->title = $request->title;
            $link->thumbnail = env('APP_URL') . $destination . $thumbnail_new_name;
            $link->link = $request->link;
            $link->price = $link->price;
            $link->save();

            $request->session()->flash('message', 'Link updated successfully');
            return back();
        } else {
            $link->title = $request->title;
            $link->link = $request->link;
            $link->price = $request->price;
            $link->save();

            $request->session()->flash('message', 'Link updated successfully');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Link  $link
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Link $link)
    {
        $link->delete();
        $request->session()->flash('message', 'Link removed successfully');
        return back();
    }
}
