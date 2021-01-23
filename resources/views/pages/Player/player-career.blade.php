@extends('layouts.app')
@section('title')
    Career
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
                                <h2 class="text-primary">Player Careers</h2>
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
                                                <th>Player Name</th>
                                                <th>Nation Icon</th>
                                                <th>Tournament Year</th>
                                                <th>Tournament Name </th>
                                                <th>Sport Movement</th>
                                                <th>Player Position</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($playerCareers->career as $key => $playerCareer)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $player->player_name }}</td>
                                                    <td>
                                                      <div style="width: 100px; height:100px;">
                                                        <img src="{{ $playerCareer->nation_icon }}" alt=" " width="100%"
                                                            height="auto">
                                                    </div>
                                                    </td>
                                                    <td>{{ $playerCareer->tounament_year }}</td>
                                                    <td>{{ $playerCareer->tournament_name }}</td>
                                                    <td>{{ $playerCareer->sport_movement }}</td>
                                                    <td>{{ $playerCareer->player_position }}</td>
                                                    <td>
                                                      <a href="/edit-career?id={{ $playerCareer->id }}"
                                                        class="btn btn-primary">Edit</a>

                                                      <form style="display: inline-block"
                                                          action="/remove-career?id={{ $playerCareer->id }}" method="POST">
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
