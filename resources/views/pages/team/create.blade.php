@extends('layouts.app')

@section('title')
Add Team
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <h1 class="text-secondary font-weight-bold float-left">Team</h1>
                    <a href="{{ url('scores') }}" class="btn btn-primary float-right m-2">Back</a>
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
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-75 m-auto">
                            <label class="font-weight-bold" for="name">Team One Image</label>
                            <input type="file" name="team_one_image" id="team_one_image" class="form-control">

                            <label class="font-weight-bold" for="email">Team One name</label>
                            <input type="text" name="team_one_name" id="team_one_name" value="{{ old('team_one_name') }}" class="form-control">


                            <label class="font-weight-bold" for="name">Team Two Image</label>
                            <input type="file" name="team_two_image" id="team_two_image"  class="form-control">

                            <label class="font-weight-bold" for="name">Team Two Name</label>
                            <input type="text" name="team_two_name" id="team_two_name" value="{{ old('team_two_name') }}" class="form-control">

                            <br>
                            <button class="btn btn-success float-right">Add Team</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
