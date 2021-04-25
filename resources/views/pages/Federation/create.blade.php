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
                    <div class="mb-2">
                        <h2 class="font-weight-bold text-secondary float-left">Add Federation</h2>
                        <a href="{{ Route('federations.index') }}" class="btn btn-success float-right">Back</a>
                    </div>
                    <br><br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" enctype="multipart/form-data" action="{{ Route('federations.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image<span style="color:#ff0000"> *</span></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Player Name
                                <span style="color:#ff0000">*</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="player_name" placeholder="Player Name"
                                    value="{{ old('player_name') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Player Rank
                                <span style="color:#ff0000">
                                    *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="player_rank" placeholder="Player Rank"
                                    value="{{ old('player_rank') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">FICB
                                <span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="ficb" value="{{ old('ficb') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">UISP
                                <span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="uisp" value="{{ old('uisp') }}" rquired>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ITSF
                                <span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="itsf" value="{{ old('itsf') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">LICB
                                <span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="licb" value="{{ old('licb') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Fpicb
                                <span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fpicb" value="{{ old('fpicb') }}"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">p4p
                                <span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="p4p" value="{{ old('p4p') }}" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right">Add Federation</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
