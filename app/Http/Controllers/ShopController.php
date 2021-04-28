<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shops = Shop::orderBy('id', 'DESC')->get();
        return view('pages.shop.main', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'shop_img' => 'required|image',
            'shop_name'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        } else {
            $file = $request->file('shop_img');
            $destinationPath = 'shop-pics/';
            $file_name = time() . $file->getClientOriginalName();
            $check = $file->move($destinationPath, $file_name);

            $data = new Shop;
            $data->shop_image = env('APP_URL') . $destinationPath . $file_name;
            $data->shop_name = $request->shop_name;
            $data->save();
            $request->session()->flash('message', 'shop add successfully.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Shop $shop)
    {
        return view('pages.shop.edit', [
            'data' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
        $validator = Validator::make($request->all(), [
            'shop_img' => 'nullable|image',
            'shop_name'  => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        } else {
            if ($request->file('shop_img')) {
                $file = $request->file('shop_img');
                $destinationPath = 'shop-pics/';
                $file_name = time() . $file->getClientOriginalName();
                $file->move($destinationPath, $file_name);

                $shop->shop_name = $request->shop_name;
                $shop->shop_image = env('APP_URL') . $destinationPath . $file_name;

                $shop->save();
            } else {
                $shop->shop_name = $request->shop_name;
                $shop->save();
            }
            $request->session()->flash('message', $request->shop_name . ' shop update successfully.');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Shop $shop)
    {
        //
        $shop->delete();

        Product::where('shop_id', $shop->id)->delete();
        $request->session()->flash('message', 'shop data remove successfully.');
        return back();
    }
}
