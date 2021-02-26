<?php

namespace App\Http\Controllers;

use App\Models\LiveScore;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LiveScoreController extends Controller
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
        return view('pages.team.score.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_set'    => 'required|integer',
            'team_one_score' => 'required|integer',
            'team_two_score' => 'required|integer',
        ]);
        $validator->after(function($validator){
            if(LiveScore::where(['team_id' => Request('id'), 'current_set' => Request('current_set')])->first())
            {
                $validator->errors()->add('current_Set', 'This set already exists');
            }
        });
        if($validator->fails())
        {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {

            $data =new LiveScore();
            $data->team_id = $id;
            $data->current_set = $request->current_set;
            $data->score_by_team_one = $request->team_one_score;
            $data->score_by_team_two = $request->team_two_score;
            $data->save();

            if($request->current_set > 1)
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
            }
            Team::where('id', $id)->update([
                'current_set_score' => $request->team_one_score.'-'. $request->team_two_score
            ]);
            $request->session()->flash('message', 'Team Score add Successfully.');
            return redirect()->route('liveScore',$id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LiveScore  $liveScore
     * @return \Illuminate\Http\Response
     */
    public function show(LiveScore $liveScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiveScore  $liveScore
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.team.score.edit', [
            'score' => LiveScore::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiveScore  $liveScore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_set'    => 'required|integer',
            'team_one_score' => 'required|integer',
            'team_two_score' => 'required|integer',
        ]);
        $validator->after(function($validator){
            $team = LiveScore::find(Request('id'));
            if(LiveScore::where('id', '!=', Request('id'))->where(['team_id' => $team->team_id, 'current_set' => Request('current_set')])->first())
            {
                $validator->errors()->add('current_Set', 'This set already exists');
            }
        });
        if($validator->fails())
        {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        else
        {

            $data =LiveScore::where('id', $id)->update([
                'current_set' => $request->current_set,
                'score_by_team_one' => $request->team_one_score,
                'score_by_team_two' => $request->team_two_score,
            ]);
            $team = LiveScore::find($id);
            Team::where('id', $team->team_id)->update([
                'current_set_score' => $request->team_one_score.'-'. $request->team_two_score
            ]);
            $request->session()->flash('message', 'Team Score add Successfully.');
            return redirect()->route('liveScore',$team->team_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiveScore  $liveScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = LiveScore::findorFail($id);
        $data->delete();
        $request->session()->flash('message', 'Team Score remove Successfully.');
        return redirect()->route('liveScore',$data->team_id);
    }
}
