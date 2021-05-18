@extends('team.layouts.app')

@section('title')
{{ Auth::guard('admin')->user()->name }} -- Club
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="p-4">
                <h1 class="text-secondary font-weight-bold text-center"> Add Player</h1>
                <form method="post" class="w-75 m-auto" enctype="multipart/form-data">
                    <a href="{{ url('team/players') }}" class="btn btn-primary float-left">Back</a>
                    <br>
                    <br>
                    <br>
                    @csrf
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Image:</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                                placeholder="Player name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Role:</label>
                            <input type="text" name="role" id="role" value="{{ old('role') }}" class="form-control"
                                placeholder="Player role">
                            @error('role')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Club:</label>
                            <input type="text" name="club" id="club" value="{{ old('club') }}" class="form-control"
                                placeholder="Player Club">
                            @error('club')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Club Image:</label>
                            <input type="file" name="club_image" id="club_image" class="form-control">
                            @error('club_image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Favourite Shot:</label>
                            <input type="text" name="shot" id="shot" value="{{ old('shot') }}" class="form-control"
                                placeholder="Player Favourite shot">
                            @error('shot')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Favourite Table:</label>
                            <input type="text" name="table" id="table" value="{{ old('table') }}" class="form-control"
                                placeholder="Player Favourite table">
                            @error('table')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Player Contry:</label>
                            <select name="country" id="country" class="form-control">
                                <option disabled selected>Choose Country .... </option>
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Sponsor Image 1:</label>
                            <input type="file" name="sponsor_image_one" id="sponsor_image_one" class="form-control">
                            @error('sponsor_image_one')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Sponsor Image Two:</label>
                            <input type="file" name="sponsor_image_two" id="sponsor_image_two" class="form-control">
                            @error('sponsor_image_two')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button class="float-right btn btn-success btn-sm btn-block">Add</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
