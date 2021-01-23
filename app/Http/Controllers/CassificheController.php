<?php

namespace App\Http\Controllers;

use App\Models\Cassifiche;
use App\Models\FederationMovement;
use Illuminate\Http\Request;

class CassificheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cassifiches = Cassifiche::with('federations')->get();
        return view('pages.FederationCassifiche.main', compact('cassifiches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $federations = FederationMovement::orderBy('id', 'DESC')->get();
        return view('pages.FederationCassifiche.create', compact('federations'));
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
        $file = $request->file('image');
        $destinationPath = '/cassifiche-img';
        $file_name = time().$file->getClientOriginalName();
        $check = $file->move($destinationPath,$file_name);

        $data = new Cassifiche();
        $data->federation_id = $request->federation;
        $data->leaderboard_name = $request->name;
        $data->image = 'http://alviawan.tk/'. $destinationPath.$file_name;
        $data->save();
        $request->session()->flash('message', 'Cassifiche add successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function show(Cassifiche $cassifiche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function edit(Cassifiche $cassifiche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cassifiche $cassifiche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cassifiche  $cassifiche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cassifiche $cassifiche)
    {
        //
    }
}
