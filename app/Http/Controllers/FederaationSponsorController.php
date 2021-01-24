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
            $data->sponser_image  = env('APP_URL'). $destinationPath . $sponsor_file_name;
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
    public function edit(Request $request)
    {
        $data = FederaationSponsor::where('id', $request->id)->first();

        return view('pages.FederationSponsor.edit')
            ->with('federations', FederationMovement::all())
            ->with('data', $data)
            ;
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
            if($request->file('image'))
            {
                $destinationPath = 'federation-sponsor-pics/';

                $sponsor_pic = $request->file('image');
                $sponsor_file_name = time().$sponsor_pic->getClientOriginalName();
                $check = $sponsor_pic->move($destinationPath,$sponsor_file_name);

                $update = FederaationSponsor::where('id', $request->id)->update([
                    'sponser_image'    => env('APP_URL'). $destinationPath . $sponsor_file_name
                ]);
                // $request->session()->flash('message', 'Event data save successfully.');
                // return redirect()->back();
            }

            FederaationSponsor::where('id', $request->id)->update([
                'federation_id' =>$request->federation,
                'sponsor_description' =>$request->description,
            ]);

            $request->session()->flash('message', 'Federation Sponsor data save successfully.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederaationSponsor  $federaationSponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $check = FederaationSponsor::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Federation Sponsor data remove successfully.');
            return redirect()->back();
        }

    }
}
