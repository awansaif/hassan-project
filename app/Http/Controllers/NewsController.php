<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
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
        return view('pages.add-news');
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
         $validator = Validator::make($request->all(), [
            'title' => 'required',
            'datetime'  => 'required',
            'details'             => 'required',
            'file'            => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $file = $request->file('file');
            $destinationPath = 'news-pics/';
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destinationPath,$file_name);
            $data = new News;
            $data->title = $request->title;
            $data->date_and_time = $request->datetime;
            $data->featured_image = 'http://alviawan.tk/'. $destinationPath.$file_name;
            $data->detail = $request->details;
            $data->save();
            $request->session()->flash('message', 'News add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
