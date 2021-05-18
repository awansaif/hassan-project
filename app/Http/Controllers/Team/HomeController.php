<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\MainClub;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
        return view('team.dashboard', [
            'clubs' => MainClub::where('created_by', Auth::guard('admin')->user()->id)->count(),
            'players' => Player::where('created_by', Auth::guard('admin')->user()->id)->count(),
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
