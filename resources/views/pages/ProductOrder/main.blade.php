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
                    <h2 class="text-primary">Product Order</h2>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Id</th>
                                    <th>Buyer Name</th>
                                    <th>Phone #</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Payment Time</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->users->name }}</td>
                                    <td>{{ $order->users->phone_number }}</td>
                                    <td>{{ $order->products->product_name }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        <a href="product-order-detail?order={{ $order->id }}" class="btn btn-success font-weight-bold">Show Detail</a>
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
