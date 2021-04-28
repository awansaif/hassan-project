@extends('layouts.app')
@section('title')
Add Shop
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="pb-2">
                        <h1 class="float-left text-secondary">Add Shop</h1>
                        <a href="{{ Route('shops.index') }}" class="btn btn-success float-right">Back</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    <form method="POST" action="{{ Route('shops.store') }}" enctype="multipart/form-data">
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
                                    value="{{ old('shop_name') }}">
                            </div>
                        </div>

                        <button class="btn btn-primary">Add Shop</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
