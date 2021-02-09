@extends('layouts.app')
@section('title')
Product Order
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <a href="{{ url('product-orders') }}" class="btn btn-primary mb-4">Back</a>
                    <hr>
                    <h2 class="text-secondary">Buyer</h2>
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Phone #</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->users->name }}</td>
                                    <td>
                                        <div style="width: 50px; height: 50px; border-radius:50%;">
                                            <img src="{{ $order->users->avatar }}" alt="">
                                        </div>
                                    </td>
                                    <td>{{ $order->users->phone_number }}</td>
                                    <td>{{ $order->users->email }}</td>
                                    <td>{{ $order->users->address }}</td>
                                    <td>{{ $order->users->city }}</td>
                                    <td>{{ $order->users->gender }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h2 class="text-secondary">Product</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Product Code</th>
                                    <th>Product</th>
                                    <th>Shop Name</th>
                                    <th>Category</th>
                                    <th>Images</th>
                                    <th>Size</th>
                                    <th>Colours</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{ $order->products->product_code }}</td>
                                <td>{{ $order->products->product_name }}</td>
                                <td>{{ $order->products->shops->shop_name }}</td>
                                <td>{{ $order->products->category }}</td>
                                <td>
                                    @foreach(json_decode($order->products->product_images) as $image)
                                    <div style="width: 50px; height: 50px; float:left;">
                                        <img src="{{ $image }}" alt="" srcset="">
                                    </div>
                                    @endforeach
                                </td>
                                <td>{{  $order->products->product_size }}</td>
                                <td>
                                    @if($order->products->product_colour != null)
                                        @foreach(json_decode($order->products->product_colour) as $color)
                                            <div class="m-1 font-weight-bold text-white text-center pt-4" style="width: 60px; height: 60px; background-color:{{ $color }}; float:left;">
                                                Colour
                                            </div>
                                        @endforeach
                                    @else
                                    @endif
                                </td>
                                <td>{{ $order->products->product_new_price }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
