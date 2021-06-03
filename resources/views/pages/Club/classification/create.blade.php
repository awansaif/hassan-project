@extends('layouts.app')

@section('title')
Add Classification
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <a href="{{ Route('club-classification.index') }}" class="btn btn-primary float-left">BACK</a>
                        <h2 class="text-center text-secondary text-capitalize">ADD CLASSIFICATION</h2>
                    </div>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-8">
                            <form method="post" action="{{ Route('club-classification.store') }}"
                                enctype="multipart/form-data">
                                @csrf

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
                                @error('club')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <label>Name
                                    <span style="color:#ff0000">*</span>
                                </label>

                                <input type="text" class="form-control" name="name" placeholder="Eric"
                                    value="{{ old('name') }}">

                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Citta
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="citta" placeholder="Citta"
                                            value="{{ old('citta') }}">
                                        @error('citta')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <label for="Regione">Regione</label>
                                <input type="text" id="regione" class="form-control" name="regione"
                                    value="{{ old('regione') }}">
                                @error('regione')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Serie A
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <input type="number" class="form-control" name="serie_a" placeholder="Serie A"
                                            value="{{ old('serie_a') }}">
                                        @error('serie_a')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" col-sm-4">
                                        <label>Serie B
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <input type="number" class="form-control" name="serie_b" placeholder="Serie B"
                                            value="{{ old('serie_b') }}">
                                        @error('serie_b')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Serie C
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <input type="number" class="form-control" name="serie_c" placeholder="Serie C"
                                            value="{{ old('serie_c') }}">
                                        @error('serie_c')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Volo
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <input type="number" class="form-control" name="volo" placeholder="VOLO"
                                            value="{{ old('volo') }}">
                                        @error('volo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" col-sm-4">
                                        <label>Trad
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <input type="number" class="form-control" name="trad" placeholder="Trad"
                                            value="{{ old('trad') }}">
                                        @error('trad')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Ball
                                            <span style="color:#ff0000">*</span>
                                        </label>

                                        <input type="number" class="form-control" name="ball" placeholder="Ball"
                                            value="{{ old('ball') }}">
                                        @error('ball')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <label>Italia
                                    <span style="color:#ff0000">*</span>
                                </label>

                                <input type="number" class="form-control" name="italia" placeholder="Italia"
                                    placeholder="Italia" value="{{ old('italia') }}">

                                @error('italia')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>Champian Cup
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="number" class="form-control" name="champian_cup"
                                            value="{{ old('champian_cup') }}" placeholder="Champian Cup">
                                        @error('champian_cup')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Trofee
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="number" class="form-control" name="trofee"
                                            value="{{ old('trofee') }}" placeholder="Trofees">
                                        @error('trofee')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <button class="btn btn-primary float-right">Add Classification</button>


                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
