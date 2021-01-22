<?php

namespace App\Http\Controllers;

use App\Models\FederationMovement;
use App\Models\FederationNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FederationNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $federationNews = FederationNews::with('federations')->get();
        return view('pages.FederationNews.main',compact('federationNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $federations = FederationMovement::orderBY('id', 'DESC')->get();
        return view('pages.FederationNews.create', compact('federations'));
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
            'federation' => 'required',
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
            $destinationPath = 'federation-news-pics/';
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destinationPath,$file_name);
            $data = new FederationNews();
            $data->federation_id = $request->federation;
            $data->title = $request->title;
            $data->date_and_time = $request->datetime;
            $data->featured_image = 'http://alviawan.tk/'. $destinationPath.$file_name;
            $data->detail = $request->details;
            $data->save();
            $request->session()->flash('message', 'Federation News add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function show(FederationNews $federationNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function edit(FederationNews $federationNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FederationNews $federationNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederationNews  $federationNews
     * @return \Illuminate\Http\Response
     */
    public function destroy(FederationNews $federationNews)
    {
        //
    }
}
