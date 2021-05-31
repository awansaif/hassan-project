@extends('layouts.app')

@section('title')
Add Player
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <a href="{{ Route('player.index') }}" class="btn btn-primary float-left">BACK</a>
                        <h2 class="text-center text-secondary">ADD PLAYER</h2>
                    </div>
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
                    <div class="row">
                        <div class="col-sm-8">
                            <form method="post" action="{{ Route('player.store') }}" enctype="multipart/form-data">
                                @csrf

                                <label>Country
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <select name="country_name" class="form-control custom-select">
                                    <option value="" selected disabled>Choose Country for player.....</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                    @endforeach
                                </select>

                                <label>
                                    Image
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="file" class="form-control" id="player-img" name="player_image"
                                    accept="image/*">

                                <label>Name
                                    <span style="color:#ff0000">*</span>
                                </label>

                                <input type="text" class="form-control" name="player_name" placeholder="Eric"
                                    value="{{ old('player_name') }}">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Role
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="player_role"
                                            placeholder="Footballer" value="{{ old('player_role') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Club
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <select name="club" id="club" class="form-control custom-select">
                                            <option value="" selected disabled>Choose club for player....</option>
                                            @foreach ($clubs as $club)
                                            <optgroup label="{{ $club->club_name }}">
                                                @foreach ($club->clubs as $club)
                                                <option value="{{ $club->id }}">{{ $club->name  }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <label>Club Image
                                    <span style="color:#ff0000">*</span>
                                </label>

                                <input type="file" class="form-control" name="club_image" accept="image/*">


                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Favorite Shot
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="player_favorite_shot"
                                            value="{{ old('player_favorite_shot') }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Favorite Table
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="player_favorite_table"
                                            value="{{ old('player_favorite_table') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Sponser Image Top
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="file" class="form-control" name="sponser_image_one"
                                            accept="image/*">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Sponser Image Bottom
                                            <span style="color:#ff0000"> *</span>
                                        </label>
                                        <input type="file" class="form-control" name="sponser_image_two"
                                            accept="image/*">
                                    </div>
                                </div>



                                <button class="btn btn-primary float-right">Add Player</button>


                            </form>
                        </div>
                        <div class="col-sm-4">
                            <h2 class="text-secondary text-center">Player Image</h2>
                            <img src="" id="player-img-dis" alt="" width="100%" height="220px">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const playerImg = document.querySelector("#player-img")
    const playerImgdis = document.querySelector("#player-img-dis")
    playerImg.addEventListener('change', (e) => {

        let file = e.target.files[0]
        let url = URL.createObjectURL(file)

        playerImgdis.setAttribute('src', url)

    })
</script>
@endsection
