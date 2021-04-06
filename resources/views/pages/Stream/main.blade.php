@extends('layouts.app')
@section('title') Stream @endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="pb-2">
                        <h2 class="text-secondary float-left">Streams</h2>
                        <a href="{{ url('add-stream') }}" class="btn btn-success float-right">Add Stream</a>
                    </div>
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
                                    <th>Featured Image</th>
                                    <th>Title</th>
                                    <th>Live Stream Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($streams as $key => $stream)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src="{{ $stream->featured_image}}" class="card-img">
                                        </div>
                                    </td>
                                    <td>
                                        <p> {{ $stream->title }}</p>
                                    </td>
                                    <td>
                                        <div style="width: 300px; height:150px;">
                                            {{ $stream->stream_path }}
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/edit-stream?id={{$stream->id}}" class="btn btn-primary">Edit</a>
                                        <a href="/remove-stream?id={{$stream->id}}" class="btn btn-danger"> Remove</a>
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
    @endsection
