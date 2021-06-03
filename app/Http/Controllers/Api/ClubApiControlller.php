<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\ClubClassification;
use App\Models\ClubDetail;
use App\Models\FederationMovement;
use App\Models\MainClub;
use App\Models\Player;
use Illuminate\Http\Request;

class ClubApiControlller extends Controller
{
    public function main_clubs()
    {
        $data = MainClub::with('clubs')->orderBy('id', 'DESC')->get();
        return response()->json($data);
    }
    public function clubs(Request $request)
    {
        $clubs = Club::with('clubs')->where('club_id', $request->id)->orderBy('id', 'DESC')->get();
        return response()->json($clubs);
    }

    public function club_detail(Request $request)
    {

        $clubDetail = ClubDetail::with('clubs')->where('club_id', $request->id)->first();
        return response()->json([
            'clubDetail' => $clubDetail,
            'fedeations' => FederationMovement::where('club_id', $request->id)->get(),
            'players'    => Player::where('club_id', $request->id)->get(),
            'classification' => ClubClassification::where('club_id', $request->id)->get(),
        ]);
    }
    public function club_classification()
    {

        $data = [
            'statue' => 200,
            'data' => ClubClassification::orderBy('club_id', 'DESC')->get(),
        ];
        return response()->json($data);
    }
}
