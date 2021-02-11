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
                    <a href="{{ url('event-orders') }}" class="btn btn-primary mb-4">Back</a>
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
                                            <img src="{{ $order->users->avatar }}" alt="" width="100%" height="auto">
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
                    <h2 class="text-secondary">Event</h2>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Federation Name</th>
                                    <th>Event Image</th>
                                    <th>Secondary Image</th>
                                    <th>Author Image</th>
                                    <th>Author Name</th>
                                    <th>Federation</th>
                                    <th>Event Place</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{ $order->events->federations->name }}</td>
                                <td>
                                    <div style="width: 80px; height: 80px;">
                                        <img src="{{ $order->events->event_image }}" alt="" width="100%" height="auto">
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 80px; height: 80px;">
                                        <img src="{{ $order->events->secondary_image }}" alt="" width="100%" height="auto">
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 80px; height: 80px;">
                                        <img src="{{ $order->events->author_image }}" alt="" width="100%" height="auto">
                                    </div>
                                </td>
                                <td>{{  $order->events->author_name}}</td>
                                <td>{{  $order->events->federation_name }}</td>
                                <td>{{ $order->events->event_place }}</td>
                                <td>{{ $order->events->even_price }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
