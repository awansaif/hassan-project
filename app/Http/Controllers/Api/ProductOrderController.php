<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

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
        $orders = ProductOrder::with('products', 'users')
                                ->orderBy('id', 'DESC')
                                ->where('user_id', $request->user)
                                ->get();
        return response()->json($orders);
    }
}
