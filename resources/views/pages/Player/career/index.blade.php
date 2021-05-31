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
                    <div class="mb-4">
                        <h2 class="text-secondary float-left">PLAYER CAREER</h2>
                        <a href="{{ Route('playercareer.create','player=' ) }}{{ $player }}"
                            class="btn btn-success float-right">Add
                            Career</a>
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
                                    <th><i class="ti-view-list"></i></th>
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
                                @foreach ($careers as $key => $career)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $career->player->player_name }}</td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src="{{ $career->nation_icon }}" alt=" " width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>{{ $career->tounament_year }}</td>
                                    <td>{{ $career->tournament_name }}</td>
                                    <td>{{ $career->sport_movement }}</td>
                                    <td>{{ $career->player_position }}</td>
                                    <td>
                                        <a href="{{ Route('playercareer.edit', $career->id) }}"
                                            class="btn btn-primary">Edit</a>

                                        <form style="display: inline-block"
                                            action="{{ Route('playercareer.destroy',$career->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn"
                                                onclick="return confirm('Are you sure to delete this?') ">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><i class="ti-view-list"></i></th>
                                    <th>Player Name</th>
                                    <th>Nation Icon</th>
                                    <th>Tournament Year</th>
                                    <th>Tournament Name </th>
                                    <th>Sport Movement</th>
                                    <th>Player Position</th>
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
