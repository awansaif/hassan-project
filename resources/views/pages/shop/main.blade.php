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
                        <a href="{{ Route('shops.create')}}" class="btn btn-success float-right">Add Shop</a>
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
                                        <img src="{{ $shop->shop_image}}" width="100px" height="100px">
                                    </td>
                                    <td>{{ $shop->shop_name }}</td>
                                    <td>
                                        <a href="{{ Route('shops.edit', $shop->id) }}"
                                            class="btn btn-primary float-left mr-2">Edit</a>
                                        <form action="{{ Route('shops.destroy', $shop->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Remove</button>
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
