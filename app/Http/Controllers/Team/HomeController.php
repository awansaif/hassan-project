<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\MainClub;
use App\Models\Player;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    //
    public function dashboard()
    {
        return view('team.dashboard', [
            'clubs' => MainClub::where('created_by', Auth::user()->id)->count(),
            'players' => Player::where('created_by', Auth::user()->id)->count(),
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
