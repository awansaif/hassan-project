@extends('team.layouts.app')

@section('title')
{{ Auth::user()->name }} -- Career
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="p-4">
                <h1 class="text-secondary font-weight-bold float-left">Career</h1>
                <a href="{{ url('team/add-player-career', Request::route('id')) }}" class="btn btn-success float-right">Add</a>


                <div class="table-responsive">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nation Icon</th>
                                <th>Tournament Year</th>
                                <th>Tournament Name</th>
                                <th>Sport Movement</th>
                                <th>Player Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $key => $career)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ $career->nation_icon }}" alt="" width="100px" height="100px">
                                </td>
                                <td>{{ $career->tounament_year }}</td>
                                <td>{{ $career->tournament_name }}</td>
                                <td>{{ $career->sport_movement }}</td>
                                <td>{{ $career->player_position }}</td>
                                <td>
                                    <a href="{{ url('team/edit-career',$career->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('team/remove-career',$career->id) }}" class="btn btn-danger">Remove</a>
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
