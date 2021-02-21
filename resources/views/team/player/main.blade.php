@extends('team.layouts.app')

@section('title')
{{ Auth::user()->name }} -- Player
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="p-4">
                <h1 class="text-secondary font-weight-bold float-left">Player</h1>
                <a href="{{ url('team/add-player') }}" class="btn btn-success float-right">Add</a>


                <div class="table-responsive">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Country</th>
                                <th>Club Image</th>
                                <th>Club</th>
                                <th>Favourite Shot</th>
                                <th>Favourite Table</th>
                                <th>Sponsor Image</th>
                                <th>Sponsor Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $key => $player)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ $player->player_picture }}" alt="" width="100px" height="100px" class="border-rounded">
                                </td>
                                <td>{{ $player->player_name }}</td>
                                <td>{{ $player->player_role }}</td>
                                <td>{{ $player->countries->country }}</td>
                                <td>
                                    <img src="{{ $player->club_image }}" alt="" width="100px" height="100px" class="border-rounded">
                                </td>
                                <td>{{ $player->club_name }}</td>
                                <td>{{ $player->player_favorite_shot }}</td>
                                <td>{{ $player->player_favourite_table }}</td>
                                <td>
                                    <img src="{{ $player->sponser_image_one }}" alt="" width="100px" height="100px" class="border-rounded">
                                </td>
                                <td>
                                    <img src="{{ $player->sponser_image_two }}" alt="" width="100px" height="100px" class="border-rounded">
                                </td>
                                <td>
                                    <a href="{{ url('team/player-career',$player->id) }}" class="btn btn-primary">Career</a>
                                    <a href="{{ url('team/edit-player',$player->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('team/remove-player',$player->id) }}" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
