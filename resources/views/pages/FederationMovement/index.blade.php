@extends('layouts.app')
@section('title')
Federation Movement
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <h2 class="text-primary float-left">Movement List</h2>
                    <a href="{{ Route('federationmovement.create') }}" class="btn btn-success float-right">Add
                        Movement</a>
                    <br>
                    <br>
                    <hr>
                    @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Club</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Image</th>
                                    <th>Latest Event</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($federations as $key => $federation)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $federation->club? $federation->club->name : '' }}</td>
                                    <td>{{ $federation->name }}</td>
                                    <td><img src="{{ $federation->icon }}" alt="" width="100px" height="100px"></td>
                                    <td>
                                        <img src="{{ $federation->image }}" width="100px" height="100px">
                                    </td>
                                    <td>{{ $federation->latest_event }}</td>
                                    <td>
                                        <a href="{{ Route('federationmovement.edit', $federation->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form style="display: inline-block"
                                            action="{{ Route('federationmovement.destroy', $federation->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn"
                                                onclick="return confirm('Are you sure to remove this?')">Remove</button>
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
@endsection
