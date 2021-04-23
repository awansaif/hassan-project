<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendLink;
use App\Models\Link;
use App\Models\LinkOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LinkApiController extends Controller
{
    public function show()
    {
        $links = Link::orderBy('id', 'DESC')->get();
        return $links;
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'linkId' => 'required',
            'paymentId' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors()->all();
        }
        LinkOrder::create([
            'user_id' => $request->userId,
            'link_id' => $request->linkId,
            'payment' => $request->paymentId
        ]);

        $user = User::where('id', $request->userId)->first();
        $link = Link::where('id', $request->linkId)->first();
        Mail::to($user->email)->send(new SendLink($link));
        $data = [
            'repsone' => true,
            'link'    => $link->link,
            'thumbnail' => $link->thumbnail,
            'title'     => $link->title,
        ];

        return $data;
    }
}
