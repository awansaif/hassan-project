@extends('layouts.app')
@section('title')
Update Shop
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="pb-2">
                        <h1 class="float-left text-secondary">Update Shop</h1>
                        <a href="{{ Route('shops.index') }}" class="btn btn-success float-right">Back</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <form method="POST" action="{{ Route('shops.update', $data->id) }}" enctype="multipart/form-data">
                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>Shop Image *</label>
                                    </div>
                                    <div class="col-10">
                                        <input type="file" name="shop_img" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-2">
                                        <label>Shop Name*</label>
                                    </div>
                                    <div class="col-10">
                                        <input type="text" name="shop_name" class="form-control" placeholder="Shop Name"
                                            value="{{ $data->shop_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center">
                                <h2 class="text-center font-weight-bold">Shop Image</h2>
                                <img src="{{ $data->shop_image }}" alt="" width="200px" height="200px">
                            </div>
                        </div>
                        <button class="btn btn-primary">Update Shop</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
