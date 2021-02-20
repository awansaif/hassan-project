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
                <h1 class="text-secondary font-weight-bold text-center"> Update Club</h1>
                <form method="post" class="w-75 m-auto" enctype="multipart/form-data">
                    <a href="{{ url('team/show-club', Request::route('id')) }}" class="btn btn-primary float-left">Back</a>
                    <br>
                    <br>
                    <br>
                    @csrf
                    <input type="hidden" name="club_id" value="{{ $club->club_id }}">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" value="{{ $club->name }}" class="form-control" placeholder="Club name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="name">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <img src="{{ $club->image }}" alt="" width="100px" height="100px">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>
                    <label for="name">Country:</label>
                    <input type="text" name="country" id="country" value="{{ $club->country }}" class="form-control" placeholder="club country">
                    @error('country')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>
                    <br>

                    <button class="float-right btn btn-success btn-sm btn-block">Update</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
