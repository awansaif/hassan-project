<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Models\Career;
use App\Models\Player;
use App\Models\Country;
use App\Models\MainClub;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.Player.index', [
            'players' => Player::with('country', 'club')->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.Player.create', [
            'countries' => Country::get(),
            'clubs' => MainClub::with('clubs')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerStoreRequest $request)
    {
        Player::create([
            'country_id'     => $request->country_name,
            'player_name'    => $request->player_name,
            'player_picture' => $this->fileUpload('images/', $request->file('player_image')),
            'player_role' => $request->player_role,
            'club_id'   => $request->club,
            'club_image'  =>  $this->fileUpload('images/', $request->file('club_image')),
            'player_favorite_shot'   => $request->player_favorite_shot,
            'player_favourite_table' => $request->player_favorite_table,
            'sponser_image_one' =>  $this->fileUpload('images/', $request->file('sponser_image_one')),
            'sponser_image_two' =>  $this->fileUpload('images/', $request->file('sponser_image_two')),
        ]);

        $request->session()->flash('message', 'Player add successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(player $player)
    {
        return view('pages.Player.career.index', [
            'careers' => Career::with('player')->where('player_id', $player->id)->get(),
            'player'  => $player->id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(player $player)
    {
        return view('pages.Player.edit', [
            'player' => $player,
            'countries' => Country::get(),
            'clubs' => MainClub::with('clubs')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerUpdateRequest $request, player $player)
    {
        $player->update([
            'country_id'     => $request->country_name,
            'player_name'    => $request->player_name,
            'player_picture' => $request->file('player_image') ? $this->fileUpload('images/', $request->file('player_image')) : $player->player_picture,
            'player_role' => $request->player_role,
            'club_id'   => $request->club,
            'club_image'  =>  $request->file('club_image') ? $this->fileUpload('images/', $request->file('club_image')) : $player->club_image,
            'player_favorite_shot'   => $request->player_favorite_shot,
            'player_favourite_table' => $request->player_favorite_table,
            'sponser_image_one' => $request->file('sponser_image_one') ? $this->fileUpload('images/', $request->file('sponser_image_one')) : $player->sponser_image_one,
            'sponser_image_two' => $request->file('sponser_image_two') ? $this->fileUpload('images/', $request->file('sponser_image_two')) : $player->sponser_image_two,
        ]);

        $request->session()->flash('message', 'Player updated successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(player $player)
    {
        $player->delete();
        return back()->with('message', 'Player removed successfully.');
    }


    protected function fileUpload($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . $file->getClientOriginalName();
        $file->move($destination, $file_name);

        return env('APP_URL') . $destination . $file_name;
    }
}
