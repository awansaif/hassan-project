<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::with('shops')->orderBY('id', 'DESC')->get();
        return view('pages.Product.main', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::orderBy('id', 'DESC')->get();
        return view('pages.Product.create', compact('shops'));
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
            'shop'  => 'required',
            'images.*' => 'required|image',
            'product_name'  => 'required',
            'product_size'  => 'required',
            'product_description' => 'required',
            'product_old_price' => 'nullable',
            'product_new_price' => 'required',
            'category'          => 'required',
            'product_color'    => 'nullable',
            'product_code'       => 'required|unique:products'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        } else {
            $images = $request->file('images');
            for ($i = 0; $i < count($images); $i++) {
                $new_name = rand() . '.' . $images[$i]->getClientOriginalExtension();
                $images[$i]->move(public_path('product-imgs'), $new_name);
                $img[] =  env('APP_URL') . 'product-imgs/' . $new_name;
            }
            if ($request->product_color[0] === '#000000' && $request->product_color[1] === '#000000' && $request->product_color[2] === '#000000') {
                $data = new Product;
                $data->shop_id = $request->shop;
                $data->product_images =  json_encode($img);
                $data->product_name = $request->product_name;
                $data->product_size = $request->product_size;
                $data->product_description = $request->product_description;
                $data->product_old_price = $request->product_old_price;
                $data->product_new_price = $request->product_new_price;
                $data->category = $request->category;
                $data->product_code = $request->product_code;
                $data->save();
                $request->session()->flash('message', 'Product add successfully.');
                return redirect()->back();
            } else {
                for ($i = 0; $i < count($request->product_color); $i++) {
                    $colors[] = $request->product_color[$i];
                }
                $data = new Product;
                $data->shop_id = $request->shop;
                $data->product_images =  json_encode($img);
                $data->product_name = $request->product_name;
                $data->product_size = $request->product_size;
                $data->product_description = $request->product_description;
                $data->product_old_price = $request->product_old_price;
                $data->product_new_price = $request->product_new_price;
                $data->category = $request->category;
                $data->product_colour = json_encode($colors);
                $data->product_code = $request->product_code;
                $data->save();
                $request->session()->flash('message', 'Product add successfully.');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('pages.Product.edit', [
            'data' => $product,
            'shops' => Shop::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $validator = Validator::make($request->all(), [
            'shop'  => 'required',
            'images.*' => 'nullable|image',
            'product_name'  => 'required',
            'product_size'  => 'required',
            'product_description' => 'required',
            'product_old_price' => 'nullable',
            'product_new_price' => 'required',
            'category'          => 'required',
            'product_color'    => 'nullable',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                ->withInput();
        } else {
            if ($request->file('images')) {

                $images = $request->file('images');
                for ($i = 0; $i < count($images); $i++) {
                    $new_name = rand() . '.' . $images[$i]->getClientOriginalExtension();
                    $images[$i]->move(public_path('product-imgs'), $new_name);
                    $img[] =  env('APP_URL') . 'product-imgs/' . $new_name;
                }
                foreach ($request->product_color as $color) {
                    $colors[] = $color;
                }
                $product->update([
                    'shop_id' => $request->shop,
                    'product_images' =>  json_encode($img),
                    'product_name' => $request->product_name,
                    'product_size' => $request->product_size,
                    'product_description' => $request->product_description,
                    'product_old_price' => $request->product_old_price,
                    'product_new_price' =>  $request->product_new_price,
                    'category'     => $request->category,
                    'product_colour' => json_encode($colors),
                ]);
            } else {
                foreach ($request->product_color as $color) {
                    $colors[] = $color;
                }
                $product->update([
                    'shop_id' => $request->shop,
                    'product_name' => $request->product_name,
                    'product_size' => $request->product_size,
                    'product_description' => $request->product_description,
                    'product_old_price' => $request->product_old_price,
                    'product_new_price' =>  $request->product_new_price,
                    'category'     => $request->category,
                    'product_colour' => json_encode($colors),
                ]);
            }
            $request->session()->flash('message', 'Product update successfully.');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('message', 'Product remove successfully.');
        return back();
    }

    public function update_stock(Request $request)
    {
        $data = Product::find($request->id);
        if ($data->stock == 1) {
            $data->stock = 0;
            $data->save();
            $request->session()->flash('message', 'Product stock updated successfully.');
            return redirect()->back();
        } else {
            $data->stock = 1;
            $data->save();
            $request->session()->flash('message', 'Product stock updated successfully.');
            return redirect()->back();
        }
    }
}
