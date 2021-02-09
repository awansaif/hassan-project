<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventOrder;
use Illuminate\Http\Request;

class EventOrderController extends Controller
{
    //
    public function save_order(Request $request)
    {
        $data = new EventOrder();
        $data->event_id = $request->event;
        $data->user_id = $request->user;
        $data->price = $request->price;
        $data->date = date('Y-m-d');
        if($data->save())
        {
            $data = [
                'success' => true,
                'response' => 'Your order is placed.'
            ];
            return response()->json($data);
        }

    }

    public function orders(Request $request)
    {
        $orders = EventOrder::with('products', 'users')
                                ->orderBy('id', 'DESC')
                                ->where('user_id', $request->user)
                                ->get();
        return response()->json($orders);
    }
}
