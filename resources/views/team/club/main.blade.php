@extends('team.layouts.app')

@section('title')
{{ Auth::user()->name }} -- Club
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="p-4">
                <h1 class="text-secondary font-weight-bold float-left">Club</h1>
                <a href="{{ url('team/add-main-club') }}" class="btn btn-success float-right">Add</a>


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
                                <th>Club Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $key => $club)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $club->club_name }}</td>
                                <td>
                                    <a href="{{ url('team/show-club',$club->id) }}" class="btn btn-primary">Show</a>
                                    <a href="{{ url('team/edit-main-club',$club->id) }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('team/remove-main-club',$club->id) }}" class="btn btn-danger">Remove</a>
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
