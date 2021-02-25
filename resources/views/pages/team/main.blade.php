@extends('layouts.app')

@section('title')
Team Scores
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <h1 class="text-secondary font-weight-bold float-left">Teams</h1>
                    <a href="{{ url('add-team') }}" class="btn btn-success float-right">Add</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Team One Image</th>
                                    <th>Team One Name</th>
                                    <th>Team Two Image</th>
                                    <th>Team Two Name</th>
                                    <th>Current Set Score</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $key => $team)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ $team->team_one_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $team->team_one_name }}</td>
                                    <td>
                                        <img src="{{ $team->team_two_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $team->team_two_name }}</td>
                                    <td>{{ $team->current_set_score }}</td>
                                    <td>
                                        <a href="{{ url('edit-team', $team->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('remove-team', $team->id) }}" class="btn btn-danger">Remove</a>
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
