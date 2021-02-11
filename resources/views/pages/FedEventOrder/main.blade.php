@extends('layouts.app')
@section('title')
Event Order
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <h2 class="text-primary">Event Order</h2>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Id</th>
                                    <th>Buyer Name</th>
                                    <th>Phone #</th>
                                    <th>Federtion</th>
                                    <th>Event</th>
                                    <th>Price</th>
                                    <th>Payment Time</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->payment_id }}</td>
                                    <td>{{ $order->users->name }}</td>
                                    <td>{{ $order->users->phone_number }}</td>
                                    <td>{{ $order->events->federations->name }}</td>
                                    <td>
                                        <div style="width:80px; height: 80px; ">
                                            <img src="{{ $order->events->event_image }}" alt="" width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        <a href="federation-event-order-detail?order={{ $order->id }}" class="btn btn-success font-weight-bold">Show Detail</a>
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
