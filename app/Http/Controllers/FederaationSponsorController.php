<?php

namespace App\Http\Controllers;

use App\Models\FederaationSponsor;
use App\Models\FederationMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FederaationSponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $federaationSponsor = FederaationSponsor::with('federations')->get();
        return view('pages.FederationSponsor.main', compact('federaationSponsor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $federations = FederationMovement::orderBy('id','DESC')->get();
        return view('pages.FederationSponsor.create',compact('federations'));
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
            'description' => 'required',
            'image'         => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $destinationPath = 'federation-sponsor-pics/';

            $sponsor_pic = $request->file('image');
            $sponsor_file_name = time().$sponsor_pic->getClientOriginalName();
            $check = $sponsor_pic->move($destinationPath,$sponsor_file_name);

            $data = new FederaationSponsor();
            $data->federation_id = $request->federation;
            $data->sponsor_description = $request->description;
            $data->sponser_image  = 'http://alviawan.tk/'. $destinationPath . $sponsor_file_name;
            $data->save();
            $request->session()->flash('message', 'Federation Sponsor data save successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FederaationSponsor  $federaationSponsor
     * @return \Illuminate\Http\Response
     */
    public function show(FederaationSponsor $federaationSponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FederaationSponsor  $federaationSponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(FederaationSponsor $federaationSponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FederaationSponsor  $federaationSponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FederaationSponsor $federaationSponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederaationSponsor  $federaationSponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(FederaationSponsor $federaationSponsor)
    {
        //
    }
}
