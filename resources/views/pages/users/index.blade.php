@extends('layouts.app')

@section('title')
Registered Users
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">

                    <h2 class="text-secondary">REGISTER USERS</h2>
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
                                    <th>
                                        <i class="ti-view-list"></i>
                                    </th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>City</th>
                                    <th>Phone Number</th>
                                    <th>Zip Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Models\User::all() as $key => $user)
                                <tr>
                                    <td class="text-center">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        <img src="{{ $user->avatar? asset($user->avatar) : 'https://ui-avatars.com/api/?background=303030&color=f1f1f1&name='.$user->name }}"
                                            width="50px" height="50px" style="border-radius: 50%; overflow:hidden;">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ date('M,d Y', strtotime($user->date_of_birth)) }}</td>
                                    <td>{{ $user->city }}</td>
                                    <td>{{ $user->phone_number }}</td>
                                    <td>{{ $user->zip_code }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>
                                        <i class="ti-view-list"></i>
                                    </th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date of Birth</th>
                                    <th>City</th>
                                    <th>Phone Number</th>
                                    <th>Zip Code</th>
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
