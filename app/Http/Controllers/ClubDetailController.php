<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $clubDetail = ClubDetail::with('clubs')->where('club_id', $request->id)->get();
        return view('pages.Club-detail.main', compact('clubDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clubs = Club::orderBy('id','DESC')->get();
        return view('pages.Club-detail.add', compact('clubs'));
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
            'club' => 'required',
            'sponsor.*' => 'required|image|mimes:png,jpg',
            'image' => 'required|image|mimes:png,jpg',
            'name'  => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors()->withInput();
        }
        else{
            $images = $request->file('sponsor');
            for($i=0; $i<count($images); $i++)
            {
                $new_name = rand() . '.' . $images[$i]->getClientOriginalExtension();
                $images[$i]->move(public_path('club-sponsor-imgs'), $new_name);
                $img[] =  'http://alviawan.tk/'.'club-sponsor-imgs/'.$new_name;
            }
            $image = $request->file('image');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('club-sponsor-imgs'), $new_name);
            $image =  'http://alviawan.tk/'.'club-sponsor-imgs/'.$new_name;

            $data = new ClubDetail();
            $data->club_id = $request->club;
            $data->sponsor_images = json_encode($img);
            $data->image = $image;
            $data->name = $request->name;
            $data->save();
            $request->session()->flash('message', 'club detail add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClubDetail  $clubDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ClubDetail $clubDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClubDetail  $clubDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubDetail $clubDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClubDetail  $clubDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubDetail $clubDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClubDetail  $clubDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ClubDetail $clubDetail)
    {
        //
        $delete = ClubDetail::where('id', $request->id)->delete();
        $request->session()->flash('message', 'club detail reomve successfully.');
        return redirect()->back();
    }
}
