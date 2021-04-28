@extends('layouts.app')
@section('title')
Product
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-secondary float-left">Product List</h2>
                        <a href="{{ Route('products.create') }}" class="btn btn-success float-right">Add Product</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Id</th>
                                    <th>Shop</th>
                                    <th>Category</th>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Detail</th>
                                    <th>Old Price</th>
                                    <th>New Price</th>
                                    <th>Colours</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->shops->shop_name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>
                                        @foreach(json_decode($product->product_images) as $image)
                                        <img src="{{ $image }}" width="50px" height="50px" class="float-left">
                                        @endforeach
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_size }}</td>
                                    <td>{{ $product->product_description }}</td>
                                    <td>{{ $product->product_old_price }}</td>
                                    <td>{{ $product->product_new_price }}</td>
                                    <td>
                                        @if($product->product_colour != null)
                                        @foreach(json_decode($product->product_colour) as $color)
                                        <div
                                            style="width: 50px; height:50px; background-color:{{$color}}; color:white;">
                                            <span>Color</span>
                                        </div>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->stock == 0)
                                        <a href="/update-stock?id={{ $product->id }}" class="btn btn-danger">Out's
                                            Stock</a>
                                        @else
                                        <a href="/update-stock?id={{ $product->id }}" class="btn btn-success">In
                                            Stock</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ Route('products.edit', $product->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ Route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">{{ __("REMOVE") }}</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
