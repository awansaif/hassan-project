<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\MainClub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $clubs = Club::with('clubs')->where('club_id', $req->id)->orderBy('id', 'DESC')->get();
        return view('pages.Club.main', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Club.create');
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
            'image' => 'required|image|mimes:png,jpg',
            'country' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->file('image')) {
                $images = $request->file('image');
                $new_name = rand() . '.' . $images->getClientOriginalExtension();
                $images->move(public_path('club-images'), $new_name);
                $image =  env('APP_URL') . 'club-images/' . $new_name;

                $data = new Club;
                $data->club_id = $request->id;
                $data->name = $request->name;
                $data->image = $image;
                $data->country = $request->country;
                $data->save();
                $request->session()->flash('message', 'Club data save successfully.');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Club $club)
    {
        //
        $data = Club::where('id', $request->id)->first();
        return view('pages.Club.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'nullable|image|mimes:png,jpg',
            'country' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->file('image')) {
                $images = $request->file('image');
                $new_name = rand() . '.' . $images->getClientOriginalExtension();
                $images->move(public_path('club-images'), $new_name);
                $image =  env('APP_URL') . 'club-images/' . $new_name;
                $update = Club::where('id', $request->club_id)->update([
                    'name' => $request->name,
                    'image' => $image,
                    'country' => $request->country
                ]);
                $request->session()->flash('message', 'Club data updated successfully.');
                return redirect()->back();
            } else {
                $update = Club::where('id', $request->club_id)->update([
                    'name' => $request->name,
                    'country' => $request->country
                ]);
                $request->session()->flash('message', 'Club data updated successfully.');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Club $club)
    {
        //
        $delete = Club::where('id', $request->id)->delete();
        $request->session()->flash('message', 'Club data deleted successfully.');
        return redirect()->back();
    }
}
