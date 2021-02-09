<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use App\Models\EventOrder;
use Illuminate\Http\Request;
use App\Models\User;

class ProductOrderController extends Controller
{
    //

    public function save_order(Request $request)
    {
        $data = new ProductOrder();
        $data->product_id = $request->product;
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
        $products = ProductOrder::with('products', 'users')
                                ->orderBy('id', 'DESC')
                                ->where('user_id', $request->user)
                                ->get();
        $events = EventOrder::with('events', 'users')
                                ->orderBy('id', 'DESC')
                                ->where('user_id', $request->user)
                                ->get();
        $data = [
            'products' => $products,
            'events'   => $events,
        ];
        return response()->json($data);
    }
}
