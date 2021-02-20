@extends('layouts.app')

@section('title')
Update Team Member
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <h1 class="text-secondary font-weight-bold float-left">Member</h1>
                    <a href="{{ url('team-members') }}" class="btn btn-primary float-right m-2">Back</a>
                    <br>
                    <br>
                    <hr>
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="w-75 m-auto">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <form method="post">
                        @csrf
                        <div class="w-75 m-auto">
                            <label class="font-weight-bold" for="name">Member Name</label>
                            <input type="text" name="name" id="name" value="{{ $member->name }}" class="form-control">

                            <label class="font-weight-bold" for="email">Member Email</label>
                            <input type="email" name="email" id="email" value="{{ $member->email }}" class="form-control">


                            <label class="font-weight-bold" for="name">Member Password</label>
                            <input type="password" name="password" id="Password" value="{{ $member->v_password }}" class="form-control">

                            <br>
                            <button class="btn btn-success float-right">Update Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
