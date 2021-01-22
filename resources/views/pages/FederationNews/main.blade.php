@extends('layouts.app')
@section('title')
Federation News
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
                            <h2 class="text-primary">Federation News List</h2>
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
                                            <th>Federation</th>
                                            <th>Title</th>
                                            <th>Featured Image</th>
                                            <th>Date & Time</th>
                                            <th>Detail</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($federationNews as $key => $news)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $news->federations->name}}</td>
                                            <td>{{ $news->title }}</td>
                                            <td>
                                                <div style="width: 200px; height:200px" >
                                                    <img src="{{ $news->featured_image }}" alt="" width="100%" height="auto">
                                                </div>
                                            </td>
                                            <td>
                                                {{ $news->date_and_time }}
                                            </td>
                                            <td>{{ $news->detail }}</td>
                                            <td>
                                                <a href="/edit-federation-news?id={{ $news->id }}" class="btn btn-primary">Edit</a>
                                                <a href="/remove-federation-news?id={{ $news->id }}" class="btn btn-danger">
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
