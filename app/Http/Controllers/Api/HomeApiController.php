<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FederationMovement;
use App\Models\FlashNews;
use App\Models\LatestEvent;
use App\Models\RecentNews;
use App\Models\Sponsor;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeApiController extends Controller
{
    public function home()
    {

        $data = [
            'movements' => FederationMovement::orderBY('id', 'DESC')->get(),
            'flash_news' => FlashNews::orderBy('id', 'DESC')->get(),
            'latest_news' => RecentNews::orderBy('id', 'DESC')->take(5)->get(),
            'latest_event' => LatestEvent::orderBY('id', 'DESC')->take(5)->get(),
            'sponsors' => Sponsor::orderby('id','DESC')->get(),
            'videos' => Video::orderBy('id', 'DESC')->get(),
        ];
        return response()->json($data);
    }
}
