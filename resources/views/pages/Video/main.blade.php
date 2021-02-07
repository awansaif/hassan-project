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
                    <div class="pb-2">
                        <h1 class="text-secondary float-left">Videos</h1>
                        <a href="/add-video" class="btn btn-primary float-right">Add Video</a>
                    </div>
                    <br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success mt-5">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th>Video</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videos as $key => $video)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $video->video_title }}</td>
                                    <td>
                                        <div style="width:100px; height: 100px;">
                                            <img src="{{ $video->thumbnail }}" width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>
                                        <div style="width:100px; height: 100px;">
                                            <iframe width="100%" height="auto"
                                                src="https://www.youtube.com/embed/{{ $video->video_path }}">
                                            </iframe>
                                        </div>
                                    </td>
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
@endsection
