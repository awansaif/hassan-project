@extends('team.layouts.app')

@section('title')
{{ Auth::guard('admin')->user()->name }} -- Career
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="p-4">
                <h1 class="text-secondary font-weight-bold text-center"> Add Career</h1>
                <form method="post" class="w-75 m-auto" enctype="multipart/form-data">
                    <a href="{{ url('team/player-career',Request::route('id')) }}"
                        class="btn btn-primary float-left">Back</a>
                    <br>
                    <br>
                    <br>
                    @csrf
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Nation ICon:</label>
                            <input type="file" name="icon" id="icon" class="form-control">
                            @error('icon')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Tournament Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control"
                                placeholder="Tournament name">
                            @error('name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Tournament Year:</label>
                            <input type="text" name="year" id="year" value="{{ old('year') }}" class="form-control"
                                placeholder="Tournament year">
                            @error('year')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="name">Sport Movement:</label>
                            <input type="text" name="movement" id="movement" value="{{ old('movement') }}"
                                class="form-control" placeholder="Sport Movement">
                            @error('movement')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <label for="name">Player Position:</label>
                            <input type="text" name="position" id="position" value="{{ old('position') }}"
                                class="form-control" placeholder="Player Position">
                            @error('position')
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
