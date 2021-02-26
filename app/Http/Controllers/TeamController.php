<?php

namespace App\Http\Controllers;

use App\Models\LiveScore;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.team.main', [
            'teams' => Team::orderBY('id', 'DESC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'team_one_image' => 'required|image',
            'team_one_name' => 'required',
            'team_two_image' => 'required|image',
            'team_two_name' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {
            if($request->hasFile('team_one_image') && $request->hasFile('team_two_image'))
            {
                $destinationPath = 'team-pics/';

                $file1 = $request->file('team_one_image');
                $featured_image = time().$file1->getClientOriginalName();
                $file1->move($destinationPath,$featured_image);

                $file2 = $request->file('team_two_image');
                $featured_image1 = time().$file2->getClientOriginalName();
                $file2->move($destinationPath,$featured_image1);

                $data = new Team();
                $data->team_one_image = env('APP_URL').$destinationPath.$featured_image;
                $data->team_one_name  = $request->team_one_name;
                $data->team_two_image = env('APP_URL').$destinationPath.$featured_image1;
                $data->team_two_name  = $request->team_two_name;
                $data->save();
                $request->session()->flash('message', 'Teams added successfully.');
                return redirect()->route('teams');

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scores = LiveScore::with('teams')->where('team_id', $id)->get();
        return view('pages.team.score.main', compact('scores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('pages.team.edit', [
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'team_one_image' => 'nullable|image',
            'team_one_name' => 'required',
            'team_two_image' => 'nullable|image',
            'team_two_name' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {
            if($request->hasFile('team_one_image') && $request->hasFile('team_two_image'))
            {
                $destinationPath = 'team-pics/';

                $file1 = $request->file('team_one_image');
                $featured_image = time().$file1->getClientOriginalName();
                $file1->move($destinationPath,$featured_image);

                $file2 = $request->file('team_two_image');
                $featured_image1 = time().$file2->getClientOriginalName();
                $file2->move($destinationPath,$featured_image1);

                $data =Team::where('id', $id)
                                ->update([
                                    'team_one_image' => env('APP_URL').$destinationPath.$featured_image,
                                    'team_one_name' => $request->team_one_name,
                                    'team_two_image' => env('APP_URL').$destinationPath.$featured_image1,
                                    'team_two_name'  => $request->team_two_name,
                                ]);
                $request->session()->flash('message', 'Teams updated successfully.');
                return redirect()->route('teams');
            }
            elseif($request->hasFile('team_one_image'))
            {
                $destinationPath = 'team-pics/';

                $file1 = $request->file('team_one_image');
                $featured_image = time().$file1->getClientOriginalName();
                $file1->move($destinationPath,$featured_image);


                $data =Team::where('id', $id)
                                ->update([
                                    'team_one_image' => env('APP_URL').$destinationPath.$featured_image,
                                    'team_one_name' => $request->team_one_name,
                                    'team_two_name'  => $request->team_two_name,
                                ]);
                $request->session()->flash('message', 'Teams updated successfully.');
                return redirect()->route('teams');
            }
            elseif($request->hasFile('team_two_image'))
            {
                $destinationPath = 'team-pics/';

                $file2 = $request->file('team_two_image');
                $featured_image1 = time().$file2->getClientOriginalName();
                $file2->move($destinationPath,$featured_image1);

                $data =Team::where('id', $id)
                                ->update([
                                    'team_two_image' => env('APP_URL').$destinationPath.$featured_image1,
                                    'team_one_name' => $request->team_one_name,
                                    'team_two_name'  => $request->team_two_name,
                                ]);
                $request->session()->flash('message', 'Teams updated successfully.');
                return redirect()->route('teams');
            }
            else
            {
                $data =Team::where('id', $id)
                                ->update([
                                    'team_one_name' => $request->team_one_name,
                                    'team_two_name'  => $request->team_two_name,
                                ]);
                $request->session()->flash('message', 'Teams updated successfully.');
                return redirect()->route('teams');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id)
    {
        $team = Team::find($id);
        $team->delete();
        $req->session()->flash('message', 'Teams remove successfully.');
        return redirect()->route('teams');
    }

    public function match_start(Request $req,$id)
    {
        $team = Team::where('id', $id)->update([
            'match_start_time' => date('Y-m-d H:i:s')
        ]);
        $req->session()->flash('message', 'Teams match started.');
        return redirect()->route('teams');
    }

    public function match_stop(Request $req,$id)
    {
        $data = LiveScore::where('team_id', $id)->latest('id')->first();

        if($data->score_by_team_one > $data->score_by_team_two)
        {
            $team = Team::find($id);
            Team::where('id', $id)->update([
                'set_won_by_team_one' => $team->set_won_by_team_one + 1
            ]);
        }
        else
        {
            $team = Team::find($id);
            Team::where('id', $id)->update([
                'set_won_by_team_two' => $team->set_won_by_team_two + 1
            ]);
        }
        $team = Team::where('id', $id)->update([
            'match_end_time' => date('Y-m-d H:i:s')
        ]);
        $req->session()->flash('message', 'Teams match end at '.date('H:i:s'). '.');
        return redirect()->route('teams');
    }

    public function team_set_score($id)
    {
        return view('pages.team.score.set-score', [
            'team' => Team::find($id)
        ]);
    }
 }
