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
                    <h1 class="text-secondary font-weight-bold float-left">Team Score</h1>
                    {{-- <a href="{{ url('team-set-score', Request::route('id')) }}" class="btn btn-primary ml-2 float-right">Set Won</a> --}}
                    <a href="{{ url('add-team-score', Request::route('id')) }}" class="btn btn-success float-right">Add</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Current Set</th>
                                    <th>Team One Image</th>
                                    <th>Team One Name</th>
                                    <th>Team One Score</th>
                                    <th>Team Two Image</th>
                                    <th>Team Two Name</th>
                                    <th>Team two Score</th>
                                    <th>Set Score</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scores as $key => $score)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $score->current_set }}</td>
                                    <td>
                                        <img src="{{ $score->teams->team_one_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $score->teams->team_one_name }}</td>
                                    <th>{{ $score->score_by_team_one }}</th>
                                    <td>
                                        <img src="{{ $score->teams->team_two_image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $score->teams->team_two_name }}</td>
                                    <th>{{ $score->score_by_team_two }}</th>
                                    <th>{{ $score->score_by_team_one }} - {{ $score->score_by_team_two }}</th>
                                    <td>
                                        <a href="{{ url('edit-team-score', $score->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('remove-team-score', $score->id) }}" class="btn btn-danger">Remove</a>
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
