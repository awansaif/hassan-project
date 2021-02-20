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
                <h1 class="text-secondary font-weight-bold text-center"> Add Club Detail</h1>
                <form method="post" class="w-75 m-auto" enctype="multipart/form-data">
                    <a href="{{ url('team/detail-club',Request::route('id')) }}" class="btn btn-primary float-left">Back</a>
                    <br>
                    <br>
                    <br>
                    @csrf
                    <label for="name">Sponsor:</label>
                    <input type="file" name="sponsor[]" id="sponsor"  class="form-control" required>
                    <input type="file" name="sponsor[]" id="sponsor"  class="form-control">
                    <input type="file" name="sponsor[]" id="sponsor"  class="form-control">
                    @error('sponsor')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="name">Image:</label>
                    <input type="file" name="image" id="image"  class="form-control">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name"  value="{{ old('name') }}" class="form-control">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <br>
                    <br>

                    <button class="float-right btn btn-success btn-sm btn-block">Add</button>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
