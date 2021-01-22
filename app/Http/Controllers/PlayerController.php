<?php

namespace App\Http\Controllers;

use App\Models\player;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
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
        $countries = Country::get();
        return view('pages.Player.add-player',compact('countries'));
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
            'country_name' => 'required',
            'player_name'  => 'required',
            'player_image' => 'required|image',
            'player_role'  => 'required',
            'club_name'    => 'required',
            'club_image'   => 'required|image',
            'player_favorite_shot' => 'required',
            'player_favorite_table' => 'required',
            'sponser_image_one'  => 'required|image',
            'sponser_image_two'  => 'required|image',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
        else{

            $destinationPath = 'player-pics/';

            $player_image = $request->file('player_image');
            $player_image_name = time().$player_image->getClientOriginalName();
            $check = $player_image->move($destinationPath,$player_image_name);

            $club_image = $request->file('club_image');
            $club_image_name = time().$club_image->getClientOriginalName();
            $check = $club_image->move($destinationPath,$club_image_name);

            $sponser_image_one = $request->file('sponser_image_one');
            $sponser_image_one_name = time().$sponser_image_one->getClientOriginalName();
            $check = $sponser_image_one->move($destinationPath,$sponser_image_one_name);

            $sponser_image_two = $request->file('sponser_image_two');
            $sponser_image_two_name = time().$sponser_image_two->getClientOriginalName();
            $check = $sponser_image_two->move($destinationPath,$sponser_image_two_name);

            $data = new Player;
            $data->country_id = $request->country_name;
            $data->player_name = $request->player_name;
            $data->player_picture = 'http://alviawan.tk/'. $destinationPath.$player_image_name;
            $data->player_role = $request->player_role;
            $data->club_name   = $request->club_name;
            $data->club_image   = 'http://alviawan.tk/'. $destinationPath.$club_image_name;
            $data->player_favorite_shot = $request->player_favorite_shot;
            $data->player_favourite_table = $request->player_favorite_table;
            $data->sponser_image_one = 'http://alviawan.tk/'. $destinationPath.$sponser_image_one_name;
            $data->sponser_image_two = 'http://alviawan.tk/'. $destinationPath.$sponser_image_two_name;
            $data->save();
            $request->session()->flash('message', 'Player add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(player $player)
    {
        //
    }
}
