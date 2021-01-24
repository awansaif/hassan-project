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
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-primary">Video List</h2>
                        </div>
                        <div class="card-body">
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
                                            <th>Title</th>
                                            <th>Video</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($videos as $key => $video)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $video->video_title }}</td>
                                            <td><video src="{{ $video->video_path }}"></video></td>
                                            <td>
                                                <a href="/edit-video?id={{ $video->id }}" class="btn btn-primary">Edit</a>
                                                <a href="/remove-video?id={{ $video->id }}" class="btn btn-danger">
                                                    Remove</a>
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
    </div>
</div>
@endsection
