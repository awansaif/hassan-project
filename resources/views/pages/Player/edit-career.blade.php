@extends('layouts.app')

@section('title')
  Player Career
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h1 class="text-primary">Edit Player Career</h1>
                                        <hr>
                                    </div>
                                    <div class="card-block">
                                        <!--- <h4 class="sub-title">Basic Inputs</h4> -->

                                        @if (Session::has('message'))
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
                                        <form id="event-form" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="playerCareerId" value="{{ $career->id }}">

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Nation Icon<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="nation_icon">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tournament Year<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="tounament_year"
                                                        placeholder="Tournanment Year" value="{{ $career->tounament_year }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tournament Name<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <textarea rows="3" cols="2" class="form-control"
                                                        placeholder="Tournament Name"
                                                        name="tournament_name">{{ $career->tournament_name }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Sport Movement<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="sport_movement"
                                                        placeholder="" value="{{ $career->sport_movement }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Player Position<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="player_position"
                                                        placeholder="" value="{{ $career->player_position }}">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary float-right"
                                                id="primary-popover-content" data-container="body" data-toggle="popover"
                                                title="Primary color states" data-placement="bottom">Update Player
                                                Career</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page body end -->
                    </div>
                </div>
            </div>
        </div>
        <div>

        @endsection
