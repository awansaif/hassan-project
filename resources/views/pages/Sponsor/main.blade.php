@extends('layouts.app')
@section('title')
Sponsor
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
                            <h2 class="text-primary">Sponor List</h2>
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
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sponsors as $key => $sponsor)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ $sponsor->sponser_image}}" class="card-img"></td>
                                            <td>{{ $sponsor->sponsor_description }}</td>
                                            <td>
                                                <a href="/edit-sponsor?id={{ $sponsor->id }}" class="btn btn-primary">Edit</a>
                                                <a href="/remove-sponsor?id={{ $sponsor->id }}" class="btn btn-danger">
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
