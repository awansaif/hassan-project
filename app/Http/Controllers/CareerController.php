<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.Player.career.index', [
            'careers' =>
            Career::with('player')->where('player_id', $request->id)->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::orderBy('id', 'DESC')->get();
        return view('pages.Player.career.add', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player  = $request->player;
        $request->validate([
            'nation_icon'  => 'required|image',
            'tounament_year' => 'required',
            'tournament_name' => 'required',
            'sport_movement'   => 'required',
            'player_position'  => 'required',
        ]);

        Career::create([
            'player_id' => $player,
            'nation_icon'       => $request->file('nation_icon') ? $this->fileUpload('images/', $request->file('nation_icon')) : $career->nation_icon,
            'tounament_year'    => $request->tounament_year,
            'tournament_name'   => $request->tournament_name,
            'sport_movement'    => $request->sport_movement,
            'player_position'   => $request->player_position,
        ]);
        $request->session()->flash('message', 'Player Career add successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.Player.career.edit', [
            'career' => Career::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nation_icon'  => 'nullable|image',
            'tounament_year' => 'required',
            'tournament_name' => 'required',
            'sport_movement'   => 'required',
            'player_position'  => 'required',
        ]);
        $career = Career::find($id);
        $career->update([
            'nation_icon'       => $request->file('nation_icon') ? $this->fileUpload('images/', $request->file('nation_icon')) : $career->nation_icon,
            'tounament_year'    => $request->tounament_year,
            'tournament_name'   => $request->tournament_name,
            'sport_movement'    => $request->sport_movement,
            'player_position'   => $request->player_position,
        ]);

        $request->session()->flash('message', 'Career updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Career::find($id)->delete();
        return back()->with('message', 'Player Career remove successfully.');
    }

    protected function fileUpload($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . $file->getClientOriginalName();
        $file->move($destination, $file_name);

        return env('APP_URL') . $destination . $file_name;
    }
}
