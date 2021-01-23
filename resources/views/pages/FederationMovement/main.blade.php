@extends('layouts.app')
@section('title')
    Federation Movement
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
                                <h2 class="text-primary float-left">Movement List</h2>
                                <a href="/add-federation-movement" class="btn btn-success float-right">Add Movement</a>
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
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Latest Event</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($federations as $key => $federation)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $federation->name }}</td>
                                                    <td>
                                                        <div style="width: 100px; height:100px;">
                                                            <img src="{{ $federation->image }}" class="card-img">
                                                        </div>

                                                    </td>
                                                    <td>{{ $federation->latest_event }}</td>
                                                    <td>
                                                        <a href="/edit-movement?id={{ $federation->id }}"
                                                            class="btn btn-primary">Edit</a>
																														<form style="display: inline-block"
																															action="/remove-movement?id={{ $federation->id }}" method="POST">
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
        </div>
    </div>
@endsection
