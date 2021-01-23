@extends('layouts.app')

@section('title')
Player
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <!--- <h5>Basic Form Inputs</h5>
	                            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <div class="card-block">
                                    <!--- <h4 class="sub-title">Basic Inputs</h4> -->

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
                                    <form method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="player_id" value="{{ $data->id }}" >
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Country Name<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <select name="country_name" class="form-control custom-select">
                                                    @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="player_image">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Name<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="player_name"
                                                    placeholder="Eric" value="{{ $data->player_name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Role<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="player_role"
                                                    placeholder="Footballer" value="{{ $data->player_role }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Club<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" name="club_name"
                                                    value="{{ $data->club_name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Club Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="club_image">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Favorite Shot<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="player_favorite_shot"
                                                    value="{{ $data->player_favorite_shot }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Player's Favorite Table<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="player_favorite_table"
                                                    value="{{ $data->player_favourite_table }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sponser Image Top<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="sponser_image_one">
                                            </div>
                                            <label class="col-sm-2 col-form-label" style="margin-left:3%">Sponser Image
                                                Bottom<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="sponser_image_two">
                                            </div>
                                        </div>



                                        <button type="submit" class="btn btn-primary float-right"
                                            id="primary-popover-content" data-container="body" data-toggle="popover"
                                            title="Primary color states" data-placement="bottom">Update Player</button>


                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
