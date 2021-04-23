@extends('layouts.app')
@section('title')
Link Order
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-secondary float-left">Links Order</h2>
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
                                    <th>Buyer Email</th>
                                    <th>Buyer Name</th>
                                    <th>Buyer Image</th>
                                    <th>Link Thumbnail</th>
                                    <th>Link</th>
                                    <th>Price</th>
                                    <th>Payment Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>
                                        <img src="{{ $order->user->avatar }}" alt="" width="50px" height="50px">
                                    </td>
                                    <td>
                                        <img src="{{ $order->link->thumbnail }}" alt="" width="50px" height="50px">
                                    </td>
                                    <td>{{ $order->link->link }}</td>
                                    <td>{{ $order->link->price }}</td>
                                    <td>{{ $order->payment }}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
