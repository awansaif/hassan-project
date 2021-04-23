<?php

namespace App\Http\Controllers;

use App\Models\LinkOrder;
use Illuminate\Http\Request;

class LinkOrderController extends Controller
{
    public function show()
    {
        return view('pages.Links.orders.index', [
            'orders' => LinkOrder::with('user', 'link')->get()
        ]);
    }
}
