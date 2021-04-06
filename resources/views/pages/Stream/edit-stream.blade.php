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
                    <div class="mb-2">
                        <h1 class="text-secondary text-center">Update Stream</h1>
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
                                <input type="hidden" name="stream_id" value="{{ $data->id }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Featured Image</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="file" class="form-control" name="stream_featured_image">
                                            </div>
                                            <div class="col-6">
                                                <img src="{{ $data->featured_image }}" alt="" width="300px"
                                                    height="100px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Title</label>
                                    <div class="col-sm-10">
                                        <textarea rows="2" cols="5" class="form-control" placeholder="Title"
                                            name="title">{{ $data->title }}</textarea>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Stream Link</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control mb-2" name="stream"
                                            value="{{ $data->stream_path }}">
                                        {{-- <iframe width="400" height="200"
                                            src="https://www.youtube.com/embed/{{ $data->stream_path }}">
                                        </iframe> --}}
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary float-right m-2"
                                    id="primary-popover-content" data-container="body" data-toggle="popover"
                                    title="Primary color states" data-placement="bottom">Update Stream</button>
                                <a href="{{ url('streams') }}" class="btn btn-success m-2 float-right">Back</a>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
