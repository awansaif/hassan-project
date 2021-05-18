<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Country;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    public function index()
    {
        return view('team.player.main', [
            'players' => Player::with('country')
                ->where('created_by', Auth::guard('admin')->user()->id)
                ->orderBY('id', 'DESC')
                ->get()
        ]);
    }

    public function create()
    {
        return view('team.player.create', [
            'countries' => Country::orderBY('id', 'DESC')->get()
        ]);
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'image' => 'required|image',
            'name'  => 'required',
            'role'  => 'required',
            'club'  => 'required',
            'club_image' => 'required|image',
            'shot'    => 'required',
            'table'   => 'required',
            'country' => 'required',
            'sponsor_image_one' => 'required|image',
            'sponsor_image_two' => 'required|image',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $destinationPath = 'player-pics/';

            $player_image = $req->file('image');
            $player_image_name = time() . $player_image->getClientOriginalName();
            $check = $player_image->move($destinationPath, $player_image_name);

            $club_image = $req->file('club_image');
            $club_image_name = time() . $club_image->getClientOriginalName();
            $check = $club_image->move($destinationPath, $club_image_name);

            $sponser_image_one = $req->file('sponsor_image_one');
            $sponser_image_one_name = time() . $sponser_image_one->getClientOriginalName();
            $check = $sponser_image_one->move($destinationPath, $sponser_image_one_name);

            $sponser_image_two = $req->file('sponsor_image_two');
            $sponser_image_two_name = time() . $sponser_image_two->getClientOriginalName();
            $check = $sponser_image_two->move($destinationPath, $sponser_image_two_name);

            $data = new Player();
            $data->created_by = Auth::user()->id;
            $data->country_id = $req->country;
            $data->player_name = $req->name;
            $data->player_picture = env('APP_URL') . $destinationPath . $player_image_name;
            $data->player_role = $req->role;
            $data->club_name   = $req->club;
            $data->club_image   = env('APP_URL') . $destinationPath . $club_image_name;
            $data->player_favorite_shot = $req->shot;
            $data->player_favourite_table = $req->table;
            $data->sponser_image_one = env('APP_URL') . $destinationPath . $sponser_image_one_name;
            $data->sponser_image_two = env('APP_URL') . $destinationPath . $sponser_image_two_name;
            $data->save();
            $req->session()->flash('message', $req->name . ' player add successfully.');
            return redirect()->route('team.player');
        }
    }

    public function edit($id)
    {
        return view('team.player.edit', [
            'player' => Player::find($id),
            'countries' => Country::orderBY('id', 'DESC')->get()
        ]);
    }

    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'image' => 'nullable|image',
            'name'  => 'required',
            'role'  => 'required',
            'club'  => 'required',
            'club_image' => 'nullable|image',
            'shot'    => 'required',
            'table'   => 'required',
            'country' => 'required',
            'sponsor_image_one' => 'nullable|image',
            'sponsor_image_two' => 'nullable|image',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($req->file('image') && $req->file('club_image') && $req->file('sponsor_image_one') && $req->file('sponsor_image_two')) {
                $destinationPath = 'player-pics/';

                $player_image = $req->file('image');
                $player_image_name = time() . $player_image->getClientOriginalName();
                $check = $player_image->move($destinationPath, $player_image_name);

                $club_image = $req->file('club_image');
                $club_image_name = time() . $club_image->getClientOriginalName();
                $check = $club_image->move($destinationPath, $club_image_name);

                $sponser_image_one = $req->file('sponsor_image_one');
                $sponser_image_one_name = time() . $sponser_image_one->getClientOriginalName();
                $check = $sponser_image_one->move($destinationPath, $sponser_image_one_name);

                $sponser_image_two = $req->file('sponsor_image_two');
                $sponser_image_two_name = time() . $sponser_image_two->getClientOriginalName();
                $check = $sponser_image_two->move($destinationPath, $sponser_image_two_name);

                $data = new Player();
                $data->created_by = Auth::user()->id;
                $data->country_id = $req->country;
                $data->player_name = $req->name;
                $data->player_picture = env('APP_URL') . $destinationPath . $player_image_name;
                $data->player_role = $req->role;
                $data->club_name   = $req->club;
                $data->club_image   = env('APP_URL') . $destinationPath . $club_image_name;
                $data->player_favorite_shot = $req->shot;
                $data->player_favourite_table = $req->table;
                $data->sponser_image_one = env('APP_URL') . $destinationPath . $sponser_image_one_name;
                $data->sponser_image_two = env('APP_URL') . $destinationPath . $sponser_image_two_name;
                $data->save();
                $req->session()->flash('message', $req->name . ' player updated successfully.');
                return redirect()->route('team.player');
            } elseif ($req->file('image')) {
                $destinationPath = 'player-pics/';

                $player_image = $req->file('image');
                $player_image_name = time() . $player_image->getClientOriginalName();
                $check = $player_image->move($destinationPath, $player_image_name);

                $data = Player::where('id', $id)->update([
                    'country_id' => $req->country,
                    'player_name' => $req->name,
                    'player_picture' => env('APP_URL') . $destinationPath . $player_image_name,
                    'player_role' => $req->role,
                    'club_name'   => $req->club,
                    'player_favorite_shot' => $req->shot,
                    'player_favourite_table' => $req->table
                ]);
                $req->session()->flash('message', $req->name . ' player updated successfully.');
                return redirect()->route('team.player');
            } elseif ($req->file('club_image')) {
                $destinationPath = 'player-pics/';

                $club_image = $req->file('club_image');
                $club_image_name = time() . $club_image->getClientOriginalName();
                $check = $club_image->move($destinationPath, $club_image_name);

                $data = Player::where('id', $id)->update([
                    'country_id' => $req->country,
                    'player_name' => $req->name,
                    'player_role' => $req->role,
                    'club_name'   => $req->club,
                    'club_image'   => env('APP_URL') . $destinationPath . $club_image_name,
                    'player_favorite_shot' => $req->shot,
                    'player_favourite_table' => $req->table
                ]);
                $req->session()->flash('message', $req->name . ' player updated successfully.');
                return redirect()->route('team.player');
            } else {
                $data = Player::where('id', $id)->update([
                    'country_id' => $req->country,
                    'player_name' => $req->name,
                    'player_role' => $req->role,
                    'club_name'   => $req->club,
                    'player_favorite_shot' => $req->shot,
                    'player_favourite_table' => $req->table
                ]);
                $req->session()->flash('message', $req->name . ' player updated successfully.');
                return redirect()->route('team.player');
            }
        }
    }

    public function destroy(Request $req, $id)
    {
        $player = Player::find($id);
        $player->delete();
        $req->session()->flash('message', $player->player_name . ' player remove successfully.');
        return redirect()->route('team.player');
    }

    // career

    public function career($id)
    {
        return view('team.player.career.main', [
            'careers' => Career::where('player_id', $id)->get()
        ]);
    }

    public function create_career($id)
    {
        return view('team.player.career.create');
    }

    public function store_career(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'icon' => 'required|image',
            'name'  => 'required',
            'year'  => 'required',
            'movement' => 'required',
            'position' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $file = $req->file('icon');
            $destinationPath = 'player-pics/';
            $file_name = time() . $file->getClientOriginalName();
            $check = $file->move($destinationPath, $file_name);


            $data = new Career;
            $data->player_id = $id;
            $data->nation_icon = env('APP_URL') . $destinationPath . $file_name;
            $data->tounament_year = $req->year;
            $data->tournament_name = $req->name;
            $data->sport_movement = $req->movement;
            $data->player_position = $req->position;
            $data->save();
            $req->session()->flash('message', 'Player Career add successfully.');
            return redirect()->route('team.player.career', $id);
        }
    }

    public function edit_career($id)
    {
        return view('team.player.career.edit', [
            'career' => Career::find($id)
        ]);
    }

    public function update_career(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'icon' => 'nullable|image',
            'name'  => 'required',
            'year'  => 'required',
            'movement' => 'required',
            'position' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($req->file('icon')) {
                $file = $req->file('icon');
                $destinationPath = 'player-pics/';
                $file_name = time() . $file->getClientOriginalName();
                $check = $file->move($destinationPath, $file_name);

                $update = Career::where('id', $id)->update([
                    'nation_icon'      => env('APP_URL') . $destinationPath . $file_name,
                    'tounament_year'   => $req->year,
                    'tournament_name'  => $req->name,
                    'sport_movement'   => $req->movement,
                    'player_position'  => $req->position,
                ]);
                $player = Career::find($id);
                $req->session()->flash('message', 'Player Career update successfully.');
                return redirect()->route('team.player.career', $player->player_id);
            } else {
                $update = Career::where('id', $id)->update([
                    'tounament_year'   => $req->year,
                    'tournament_name'  => $req->name,
                    'sport_movement'   => $req->movement,
                    'player_position'  => $req->position,
                ]);
                $player = Career::find($id);
                $req->session()->flash('message', 'Player Career update successfully.');
                return redirect()->route('team.player.career', $player->player_id);
            }



            $data = new Career;
            $data->player_id = $id;
            $data->nation_icon = env('APP_URL') . $destinationPath . $file_name;
            $data->tounament_year = $req->year;
            $data->tournament_name = $req->name;
            $data->sport_movement = $req->movement;
            $data->player_position = $req->position;
            $data->save();
            $req->session()->flash('message', 'Player Career add successfully.');
            return redirect()->route('team.player.career', $id);
        }
    }
    public function destroy_career(Request $req, $id)
    {
        $player = Career::find($id);
        $player->delete();
        $req->session()->flash('message', 'Player career remove successfully.');
        return redirect()->route('team.player.career', $player->player_id);
    }
}
