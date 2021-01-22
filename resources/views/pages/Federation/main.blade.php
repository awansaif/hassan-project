@extends('layouts.app')
@section('title')
Federation
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
                            <h2 class="text-primary">Federation List</h2>
                        </div>
                        <div class="card-body">
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Rank</th>
                                            <th>FICB</th>
                                            <th>UISP</th>
                                            <th>ITSF</th>
                                            <th>LICB</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($federations as $key => $federation)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $federation->player_name }}</td>
                                            <td>{{ $federation->player_rank }}</td>
                                            <td>{{ $federation->FICB }}</td>
                                            <td>{{ $federation->UISP }}</td>
                                            <td>{{ $federation->ITSF }}</td>
                                            <td>{{ $federation->LICB }}</td>
                                            <td>
                                                <a href="/edit-federation?id={{$federation->id}}" class="btn btn-primary">Edit</a>
                                                <a href="/remove-federation?id={{$federation->id}}"
                                                    class="btn btn-danger"> Remove</a>
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
