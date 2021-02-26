@extends('layouts.app')

@section('title')
Update Team Score
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <h1 class="text-secondary font-weight-bold float-left">Score</h1>
                    <a href="{{ url('team-scores', Request::route('id')) }}" class="btn btn-primary float-right m-2">Back</a>
                    <br>
                    <br>
                    <hr>
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="w-75 m-auto">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <form method="post">
                        @csrf
                        <div class="w-75 m-auto">
                            <label class="font-weight-bold" for="current_Set">Current Set: </label>
                            <input type="number" name="current_set" id="current_set" class="form-control" placeholder="Current Set" value="{{ $score->current_set }}">

                            <label class="font-weight-bold" for="name">Team One Score: </label>
                            <input type="number" name="team_one_score" id="team_one_score" class="form-control" value="{{ $score->score_by_team_one }}">

                            <label class="font-weight-bold" for="email">Team Two Score: </label>
                            <input type="number" name="team_two_score" id="team_two_score" value="{{ $score->score_by_team_two }}" class="form-control">
                            <br>
                            <button class="btn btn-success float-right">Update Score</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
