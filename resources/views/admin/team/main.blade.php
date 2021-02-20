@extends('layouts.app')

@section('title')
Team Members
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <h1 class="text-secondary font-weight-bold float-left">Members</h1>
                    <a href="{{ url('add-team-member') }}" class="btn btn-success float-right">Add</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members as $key => $member)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->v_password }}</td>
                                    <td>Team Member</td>
                                    <td>
                                        <a href="{{ url('edit-team-member', $member->id) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('remove-team-member', $member->id) }}" class="btn btn-danger">Remove</a>
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
