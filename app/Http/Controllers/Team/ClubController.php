<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\ClubDetail;
use App\Models\MainClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{
    public function index()
    {
        return view('team.club.main', [
            'clubs' => MainClub::where('created_by', Auth::guard('admin')->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('team.club.create');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $check = MainClub::create([
                'created_by' => Auth::guard('admin')->user()->id,
                'club_name'  => $req->name,
            ]);
            if ($check) {
                $req->session()->flash('message', $req->name . ' club add succesfully');
                return redirect()->route('team.club');
            }
        }
    }

    public function edit($id)
    {
        return view('team.club.edit', [
            'club' => MainClub::find($id),
        ]);
    }

    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $check = MainClub::where('id', $id)->update([
                'club_name'  => $req->name,
            ]);
            if ($check) {
                $req->session()->flash('message', $req->name . ' club updated succesfully');
                return redirect()->route('team.club');
            }
        }
    }

    public function destroy(Request $req, $id)
    {
        $club = MainClub::find($id);
        $club->delete();
        $req->session()->flash('message', $club->club_name . ' club remove successfully.');
        return redirect()->route('team.club');
    }


    public function show($id)
    {
        return view('team.club.show', [
            'clubs' => Club::where('club_id', $id)->orderBy('id', 'DESC')->get(),
        ]);
    }

    public function create_club($id)
    {
        return view('team.club.create-club');
    }

    public function save_club(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|unique:clubs,name',
            'image' => 'required|image',
            'country' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $images = $req->file('image');
            $new_name = rand() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('club-images'), $new_name);
            $image =  env('APP_URL') . 'club-images/' . $new_name;

            $check = Club::create([
                'club_id'  => $id,
                'name'   => $req->name,
                'image'  => $image,
                'country' => $req->country
            ]);
            if ($check) {
                $req->session()->flash('message', $req->name . ' club saved succesfully');
                return redirect()->route('team.show.club', $id);
            }
        }
    }


    public function edit_club($id)
    {
        return view('team.club.edit-club', [
            'club' => Club::find($id)
        ]);
    }

    public function update_club(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'image' => 'nullable|image',
            'country' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($req->file('image')) {
                $images = $req->file('image');
                $new_name = rand() . '.' . $images->getClientOriginalExtension();
                $images->move(public_path('club-images'), $new_name);
                $image =  env('APP_URL') . 'club-images/' . $new_name;

                $check = Club::where('id', $id)->update([
                    'name'   => $req->name,
                    'image'  => $image,
                    'country' => $req->country
                ]);
                if ($check) {
                    $req->session()->flash('message', $req->name . ' club saved succesfully');
                    return redirect()->route('team.show.club', $id);
                }
            } else {
                $check = Club::where('id', $id)->update([
                    'name'   => $req->name,
                    'country' => $req->country
                ]);
                if ($check) {
                    $req->session()->flash('message', $req->name . ' club updated succesfully');
                    return redirect()->route('team.show.club', $req->club_id);
                }
            }
        }
    }

    public function destroy_club(Request $req, $id)
    {
        $club = Club::find($id);
        $club->delete();
        $req->session()->flash('message', $club->name . ' club remove successfully.');
        return redirect()->route('team.show.club', $club->club_id);
    }


    public function detail_club($id)
    {
        return view('team.club.detail.main', [
            'clubs' => ClubDetail::where('club_id', $id)->get()
        ]);
    }

    public function detail_create($id)
    {
        return view('team.club.detail.create');
    }

    public function detail_store(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'sponsor.*' => 'required|image|mimes:png,jpg',
            'image' => 'required|image|mimes:png,jpg',
            'name'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $images = $req->file('sponsor');
            for ($i = 0; $i < count($images); $i++) {
                $new_name = rand() . '.' . $images[$i]->getClientOriginalExtension();
                $images[$i]->move(public_path('club-sponsor-imgs'), $new_name);
                $img[] =  env('APP_URL') . 'club-sponsor-imgs/' . $new_name;
            }
            $image = $req->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('club-sponsor-imgs'), $new_name);
            $image =  env('APP_URL') . 'club-sponsor-imgs/' . $new_name;

            $data = new ClubDetail();
            $data->club_id = $id;
            $data->sponsor_images = json_encode($img);
            $data->image = $image;
            $data->name = $req->name;
            $data->save();
            $req->session()->flash('message', 'club detail add successfully.');
            return redirect()->route('team.detail.club', $id);
        }
    }

    public function detail_destroy(Request $req, $id)
    {
        $club = ClubDetail::find($id);
        $club->delete();
        $req->session()->flash('message', $club->name . ' club remove successfully.');
        return redirect()->route('team.detail.club', $club->club_id);
    }
}
