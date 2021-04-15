@extends('layouts.app')
@section('title')
Add Link
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="pb-2">
                                <h1 class="float-left text-secondary">Add Link</h1>
                                <a href="{{ Route('links.index') }}" class="btn btn-success float-right">Back</a>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <form method="POST" action="{{ Route('links.store') }}" enctype="multipart/form-data">
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
                                    <div class="col-12">
                                        <label>Title *</label>
                                        <input type="text" name="title" class="form-control" placeholder="title"
                                            value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>Thumbnail *</label>
                                        <input type="file" name="thumbnail" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>Link *</label>
                                        <input type="url" name="link" class="form-control" placeholder="Link"
                                            value="{{ old('link') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>Price *</label>
                                        <input type="number" name="price" class="form-control" placeholder="Price"
                                            value="{{ old('price') }}">
                                    </div>
                                </div>

                                <button class="btn btn-primary">Add Link</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
