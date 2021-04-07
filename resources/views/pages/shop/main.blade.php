@extends('layouts.app')
@section('title')
Shops
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-secondary float-left">Shops List</h2>
                        <a href="{{ url('add-shop') }}" class="btn btn-success float-right">Add Shop</a>
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
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Shop Image</th>
                                    <th>Shop Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shops as $key => $shop)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src="{{ $shop->shop_image}}" class="card-img">
                                        </div>
                                    </td>
                                    <td>{{ $shop->shop_name }}</td>
                                    <td>
                                        <a href="/edit-shop?id={{$shop->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/remove-shop?id={{$shop->id}}" class="btn btn-danger"> Remove</a>
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
