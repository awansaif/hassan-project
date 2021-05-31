@extends('layouts.app')
@section('title') Players @endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-3">
                        <h2 class="text-secondary float-left">PLAYERS</h2>
                        <a href="{{ Route('player.create') }}" class="btn btn-success float-right">Add Player</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center"><i class="ti-view-list"></i></th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Club </th>
                                    <th>Image</th>
                                    <th>Favorite Shot</th>
                                    <th>Favorite Table</th>
                                    <th>Sponsers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($players as $key => $player)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>
                                        {{ $player->country->country }}
                                    </td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src=" {{ $player->player_picture }}" alt="" width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>{{ $player->player_name }}</td>
                                    <td>{{ $player->player_role }}</td>
                                    <td>{{ $player->club->name }}</td>
                                    <td>
                                        <div style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                            <img src="{{ $player->club->image }}" alt="" width="100%" height="100%">
                                        </div>
                                    </td>
                                    <td>{{ $player->player_favorite_shot }}</td>
                                    <td>{{ $player->player_favourite_table}}</td>
                                    <td>
                                        <div style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                            <img src="{{ $player->sponser_image_one }}" alt="" width="100%"
                                                height="100%">
                                        </div>
                                        <div style="width: 60px; height:60px; border-radius:50%; overflow:hidden;">
                                            <img src="{{ $player->sponser_image_two }}" alt="" width="100%"
                                                height="100%">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ Route('player.show', $player->id) }}" class="btn btn-info">Player
                                            Career</a>
                                        <a href="{{ Route('player.edit', $player->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form style="display: inline-block"
                                            action="{{ Route('player.destroy', $player->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn"
                                                onclick="return confirm('Are you sure to delete this?')">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center"><i class="ti-view-list"></i></th>
                                    <th>Country</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Club </th>
                                    <th>Image</th>
                                    <th>Favorite Shot</th>
                                    <th>Favorite Table</th>
                                    <th>Sponsers</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
