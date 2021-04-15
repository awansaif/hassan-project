@extends('layouts.app')
@section('title')
Update Link
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="pb-2">
                                <h1 class="float-left text-secondary">Update Link</h1>
                                <a href="{{ Route('links.index') }}" class="btn btn-success float-right">Back</a>
                            </div>
                            <br>
                            <br>
                            <hr>
                            <form method="POST" action="{{ Route('links.update',$link->id) }}"
                                enctype="multipart/form-data">
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
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>Title *</label>
                                        <input type="text" name="title" class="form-control" placeholder="title"
                                            value="{{ $link->title }}">
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
                                            value="{{ $link->link }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label>Price *</label>
                                        <input type="decimal" name="price" class="form-control" placeholder="Price"
                                            value="{{ $link->price }}">
                                    </div>
                                </div>

                                <button class="btn btn-primary">Update Link</button>
                            </form>
                        </div>
                        <div class="col-sm-5 text-center">
                            <h2 class="text-center">Thumbnail</h2>
                            <img src="{{ $link->thumbnail }}" alt="{{ $link->link }}" width="200px" height="200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
