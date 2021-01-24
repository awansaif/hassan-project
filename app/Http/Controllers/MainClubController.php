<?php

namespace App\Http\Controllers;

use App\Models\MainClub;
use Illuminate\Http\Request;

class MainClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clubs = MainClub::orderBy('id', 'DESC')->get();
        return view('pages.MainClub.main',compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.MainClub.create');
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
        $data = new MainClub();
        $data->club_name = $request->name;
        $data->save();
        $request->session()->flash('message', 'Main Club add successfully.');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainClub  $mainClub
     * @return \Illuminate\Http\Response
     */
    public function show(MainClub $mainClub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainClub  $mainClub
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,MainClub $mainClub)
    {
        //
        $data = MainClub::where('id', $request->id)->first();
        return view('pages.MainClub.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainClub  $mainClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainClub $mainClub)
    {
        //
        $update = MainClub::where('id', $request->club_id)->update([
            'club_name' => $request->name,
        ]);
        $request->session()->flash('message', 'Main Club updated successfully.');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainClub  $mainClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, MainClub $mainClub)
    {
        //
        $check = MainClub::where('id', $request->id)->delete();
        $request->session()->flash('message', 'Main Club removed successfully.');
        return redirect()->back();

    }
}
