@extends('layouts.app')
@section('title')
Club
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-muted float-left">Club List</h2>
                        <a href="club-create?id={{Request('id')}}" class="btn btn-success ml-2 float-right">Add
                            Club</a>
                        <a href="{{ url('main-club') }}" class="btn btn-primary float-right">Back</a>
                    </div>
                    <br>
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
                                    <th>Main Club</th>
                                    <th>Name</th>
                                    <th>image</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clubs as $key => $club)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $club->clubs->club_name }}</td>
                                    <td>
                                        {{ $club->name }}
                                    </td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src="{{ $club->image }}" class="card-img">
                                        </div>

                                    </td>
                                    <td>{{ $club->country }}</td>
                                    <td>
                                        <a href="/club-detail?id={{ $club->id }}" class="btn btn-success">Detail</a>
                                        <a href="/edit-club?id={{ $club->id }}" class="btn btn-primary">Edit</a>
                                        <a href="/remove-club?id={{$club->id}}" class="btn btn-danger"> Remove</a>
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
