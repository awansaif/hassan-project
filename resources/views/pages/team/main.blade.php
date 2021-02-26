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
                                    <th>Match Timing</th>
                                    <th>Current Set Score</th>
                                    <th>Set Won</th>
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
                                    <td>{{ $team->match_start_time }} <b>to</b> {{ $team->match_end_time }} </td>
                                    <td>{{ $team->current_set_score }}</td>
                                    <td>{{ $team->set_won_by_team_one }} - {{ $team->set_won_by_team_two }} </td>
                                    <td>
                                        @if($team->match_end_time == null)
                                            @if($team->match_start_time != null)
                                                <a href="{{ url('team-match_stop', $team->id) }}" class="btn btn-danger">Match Stop</a>
                                            @else
                                                <a href="{{ url('team-match_start', $team->id) }}" class="btn btn-primary">Match Start</a>
                                            @endif
                                        @else
                                            <button class="btn btn-success">Match Already End</button>
                                        @endif
                                        <a href="{{ url('team-scores', $team->id) }}" class="btn btn-primary">Show</a>
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
