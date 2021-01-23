<?php

namespace App\Http\Controllers;

use App\Models\FederationMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FederationMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $federations = FederationMovement::orderBy('id', 'DESC')->get();
        return view('pages.FederationMovement.main',compact('federations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.FederationMovement.create');
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
            'name' => 'required',
            'image' => 'required|image',
            'latest_event' => 'required|date|after:today'
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $destinationPath = 'federation-image/';

            $image = $request->file('image');
            $image_name = time().$image->getClientOriginalName();
            $check = $image->move($destinationPath,$image_name);
            $data = new FederationMovement();
            $data->name = $request->name;
            $data->image = 'http://alviawan.tk/'. $destinationPath . $image_name;
            $data->latest_event = $request->latest_event;
            $data->save();
            $request->session()->flash('message', 'Federation movement add successfully');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function show(FederationMovement $federationMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FederationMovement $federationMovement)
    {
        //
        $data = FederationMovement::where('id', $request->id)->first();
        return view('pages.FederationMovement.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FederationMovement $federationMovement)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image',
            'latest_event' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $data = FederationMovement::where('id', $request->id)->update([
                'name' => $request->name,
                'latest_event' => $request->latest_event,
            ]);
            $request->session()->flash('message', 'Federation movement updated successfully.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FederationMovement  $federationMovement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FederationMovement $federationMovement)
    {
        $check = FederationMovement::where('id', $request->id)->delete();
        if($check)
        {
            $request->session()->flash('message', 'Federation Movement data save successfully.');
            return redirect()->back();
        }
    }
}
