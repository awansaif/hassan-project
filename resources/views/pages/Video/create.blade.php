@extends('layouts.app')
@section('title')
Video
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="">
                        <h1 class="text-secondary text-center">Add Video</h1>
                    </div>
                    <hr>
                    <div class="row mt-4">
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
                                    <label class="col-sm-2 col-form-label font-weight-bold">Video Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="{{ old('title') }}" id="title"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Video Thumbnail</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="thumbnail" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Video Path</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="video" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success float-right m-2" id="primary-popover-content"
                                    data-container="body" data-toggle="popover" title="Primary color states"
                                    data-placement="bottom">Add Video</button>
                                <a href="{{ url('/video-list') }}" class="btn btn-primary float-right m-2">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
