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
                        <h1 class="text-secondary text-center">Update Video</h1>
                    </div>
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
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Video Title<span style="color:#ff0000">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="{{ $data->video_title }}" id="title"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Thumbnail<span style="color:#ff0000">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <div style="width:200px; height: 200px;">
                                            <img src="{{ $data->thumbnail }}" width="100%" height="auto">
                                        </div>

                                        <input type="file" class="form-control" name="thumbnail">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Video<span style="color:#ff0000">
                                            *</span></label>
                                    <div class="col-sm-10">
                                        <div style="width:200px; height: 200px;">
                                            <iframe width="100%" height="auto"
                                                src="https://www.youtube.com/embed/{{ $data->video_path }}">
                                            </iframe>
                                        </div>

                                        <input type="url" class="form-control" name="video" value="https://www.youtube.com/watch?v={{ $data->video_path }}" required>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-success float-right m-2" id="primary-popover-content"
                                    data-container="body" data-toggle="popover" title="Primary color states"
                                    data-placement="bottom">Update Video</button>
                                <a href="{{ url('/video-list') }}" class="btn btn-primary float-right m-2">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Form Inputs card end -->

    @endsection
