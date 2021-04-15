<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkApiController extends Controller
{
    public function show()
    {
        $links = Link::orderBy('id', 'DESC')->get();
        return $links;
    }
}
