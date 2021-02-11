<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FedEventOrder;
use Illuminate\Http\Request;

class FedEventOrderController extends Controller
{
    //
    public function save_order(Request $request)
    {
        $data = new FedEventOrder();
        $data->event_id = $request->event;
        $data->user_id = $request->user;
        $data->price = $request->price;
        $data->payment_id = $request->payment;
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
}
