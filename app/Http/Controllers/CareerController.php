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
        $players = Player::orderBy('id', 'DESC')->get();
        return view('pages.Player.add-career',compact('players'));
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
            'player' => 'required',
            'nation_icon'  => 'required|image',
            'tounament_year' => 'required',
            'tournament_name'            => 'required',
            'sport_movement'   => 'required',
            'player_position'  => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{
            $file = $request->file('nation_icon');
            $destinationPath = 'player-pics/';
            $file_name = time().$file->getClientOriginalName();
            $check = $file->move($destinationPath,$file_name);


            $data = new Career;
            $data->player_id = $request->player;
            $data->nation_icon = 'http://alviawan.tk/'. $destinationPath.$file_name;
            $data->tounament_year = $request->tounament_year;
            $data->tournament_name = $request->tournament_name;
            $data->sport_movement = $request->sport_movement;
            $data->player_position = $request->player_position;
            $data->save();
            $request->session()->flash('message', 'Player Career add successfully.');
            return redirect()->back();
        }
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
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        //
    }
}
