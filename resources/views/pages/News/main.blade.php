@extends('layouts.app')
@section('title')
News
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-secondary font-weight-bold float-left">News</h2>
                        <a href="{{ url('add-news') }}" class="btn btn-success float-right">Add News</a>
                    </div>
                    <br>
                    <br>
                    <hr>
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
                                            <img src=" {{ $val->featured_image }}" alt=" " width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>{{ $val->detail }}</td>

                                    <td>
                                        <a href="/edit-news?id={{ $val->id }}" class="btn btn-primary">Edit</a>

                                        <form style="display: inline-block" action="/remove-news?id={{ $val->id }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn">Remove</button>
                                        </form>
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
