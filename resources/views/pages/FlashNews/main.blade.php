@extends('layouts.app')
@section('title')
    Flash News
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
                                <h2 class="text-primary float-left">Flash News</h2>
                                <a href="/add-flash-news" class="btn btn-success float-right">Add Flash News</a>
                            </div>
                            <div class="card-body">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>News Title</th>
                                                <th>Date &amp; Time</th>
                                                <th>Featured Image</th>
                                                <th>Details</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($news as $key => $val)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $val->title }}</td>
                                                    <td>{{ $val->date_and_time }}</td>
                                                    <td>
                                                        <div style="width: 100px; height:100px;">
                                                            <img src=" {{ $val->featured_image }}" alt=" " width="100%"
                                                                height="auto">
                                                        </div>
                                                    </td>
                                                    <td>{{ $val->detail }}</td>

                                                    <td>
                                                        <a href="/edit-flash-news?id={{ $val->id }}"
                                                            class="btn btn-primary">Edit</a>

                                                        <a href="/remove-flash-news?id={{ $val->id }}" class="btn-danger btn">Remove</a>
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
