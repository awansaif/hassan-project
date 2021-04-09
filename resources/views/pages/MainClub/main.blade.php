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
                        <h2 class="text-secondary float-left">Main Clubs</h2>
                        <a href="/add-main-club" class="btn btn-success float-right">Add Main Club</a>
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
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clubs as $key => $club)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $club->club_name }}
                                    </td>
                                    <td>
                                        <a href="/club?id={{ $club->id }}" class="btn btn-success">Clubs</a>
                                        <a href="/edit-main-club?id={{ $club->id }}" class="btn btn-primary">Edit</a>
                                        <a href="/remove-main-club?id={{$club->id}}" class="btn btn-danger"> Remove</a>
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
