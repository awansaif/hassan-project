<?php

namespace App\Http\Controllers;

use App\Models\FederationMovement;
use App\Models\Product;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        $videos = Video::count();
        $federations = FederationMovement::count();
        return view('home', compact('users', 'products','videos', 'federations'));
    }
}
