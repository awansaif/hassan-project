@extends('layouts.app')
@section('title')
Stream
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <h1 class="text-center text-secondary">Add Stream</h1>
                    <hr>
                    <div class="row">
                        <div class="col-sm-10 m-auto">
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
                            <form method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Featured Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="featured_image" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Title</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" cols="5" class="form-control resize-none" placeholder="Title"
                                            name="title"> {{ old('title') }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Toutube Stream Link<span style="color:#ff0000">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" placeholder="Youtube stream link paste here." name="stream" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right m-2" id="primary-popover-content"
                                    data-container="body" data-toggle="popover" title="Primary color states"
                                    data-placement="bottom">Add Stream</button>
                                <a href="{{ url('streams') }}" class="btn btn-success m-2 float-right">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
