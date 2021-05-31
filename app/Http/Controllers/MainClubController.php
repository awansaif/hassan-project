<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainClubRequest;
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
        $clubs = MainClub::orderBy('id', 'DESC')->get();
        return view('pages.MainClub.main', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.MainClub.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainClubRequest $request)
    {
        MainClub::create([
            'club_name' => $request->name
        ]);
        $request->session()->flash('message', 'Main Club add successfully.');
        return back();
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
    public function edit($id)
    {
        return view('pages.MainClub.edit', [
            'club' => MainClub::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainClub  $mainClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:main_clubs,club_name,' . $id
        ]);
        MainClub::find($id)->update([
            'club_name' => $request->name
        ]);
        $request->session()->flash('message', 'Main Club updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainClub  $mainClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        MainClub::find($id)->delete();
        $request->session()->flash('message', 'Main Club removed successfully.');
        return redirect()->back();
    }
}
