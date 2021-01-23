@extends('layouts.app')
@section('title') Players @endsection
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-primary">Players List</h2>
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
                                                <th>Player's Country Name</th>
                                                <th>Player's Image</th>
                                                <th>Player's Name</th>
                                                <th>Player's Role</th>
                                                <th>Player's Club </th>
                                                <th>Player's Club Image</th>
                                                <th>Player's Favorite Shot</th>
                                                <th>Player's Favorite Table</th>
                                                <th>Sponser Image Top</th>
                                                <th>Sponser Image Bottom</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($players as $key => $player)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>
                                                        {{ $player->countries->country }}
                                                    </td>
                                                    <td>
                                                        <div style="width: 100px; height:100px;">
                                                            <img src=" {{ $player->player_picture }}" alt="" width="100%"
                                                                height="auto">
                                                        </div>
                                                    </td>
                                                    <td>{{ $player->player_name }}</td>
                                                    <td>{{ $player->player_role }}</td>
                                                    <td>{{ $player->lub_name }}</td>
                                                    <td>
                                                      <div
                                                          style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                                          <img src="{{ $player->club_image }}" alt="" width="100%"
                                                              height="100%">
                                                      </div>
                                                  </td>
                                                    <td>{{ $player->player_favorite_shot }}</td>
                                                    <td>{{ $player->player_favourite_table}}</td>
                                                    <td>
                                                        <div
                                                            style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                                            <img src="{{ $player->sponser_image_one }}" alt="" width="100%"
                                                                height="100%">
                                                        </div>
                                                    </td>
                                                    <td>
                                                      <div
                                                          style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                                          <img src="{{ $player->sponser_image_two }}" alt="" width="100%"
                                                              height="100%">
                                                      </div>
                                                  </td>
                                                    <td>
                                                        <a href="/edit-player?id={{ $player->id }}"
                                                            class="btn btn-primary">Edit</a>
                                                            <form style="display: inline-block"
                                                                action="/remove-player?id={{ $player->id }}" method="POST">
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
