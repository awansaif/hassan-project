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
                    <div class="mb-2">
                        <h2 class="float-left font-weight-bold text-secondary">Add Career</h2>
                        <a href="{{ url('players') }}" class="btn btn-success float-right">Back</a>
                    </div>
                    <br>
                    <br>
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
                    <form id="event-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Player<span style="color:#ff0000"> *</span>
                            </label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select" name="player">
                                    @foreach($players as $player)
                                    <option {{ Request::get('player') == $player->id ? 'selected' : ''  }}
                                        value="{{ $player->id }}">{{ $player->player_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label style="margin-top:1%;"><b>Career Area</b></label>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nation Icon<span style="color:#ff0000">
                                    *</span></label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="nation_icon" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tournament Year<span style="color:#ff0000">
                                    *</span></label>
                            <div class="col-sm-10">
                                <select class="form-control custom-select" name="tounament_year">
                                    <?php
                                       for ($year = (int)date('Y'); 1900 <= $year; $year--): ?>
                                    <option {{ old('tounament_year') == $year ?  'selected' : '' }} value="<?=$year;?>">
                                        <?=$year;?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Tournament Name
                                <span style="color:#ff0000">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select name="tournament_name" class="form-control custom-select">
                                    <option {{ old('tournament_name') == 'Singolo Naz. trad' ? 'selected' : '' }}
                                        value="Singolo Naz. trad">Singolo Naz. trad</option>

                                    <option {{ old('tournament_name') == 'Singolo Naz. volo' ? 'selected' : '' }}
                                        value="Singolo Naz. volo">
                                        Singolo Naz. volo
                                    </option>

                                    <option {{ old('tournament_name') == 'Single National' ? 'selected' : '' }}
                                        value="Single National">Single National
                                        trad</option>

                                    <option {{ old('tournament_name') == 'World cup' ? 'selected' : '' }}
                                        value="World cup">World cup</option>

                                    <option {{ old('tournament_name') == 'Doppio Naz. trad.' ? 'selected' : '' }}
                                        value="Doppio Naz. trad.">Doppio Naz. trad.</option>

                                    <option {{ old('tournament_name') == 'Doppio Naz. volo' ? 'selected' : '' }}
                                        value="Doppio Naz. volo">Doppio Naz. volo</option>

                                    <option {{ old('tournament_name') == 'Doppio Naz. rollerball' ? 'selected' : '' }}
                                        value="Doppio Naz. rollerball">Doppio Naz. rollerball</option>

                                    <option {{ old('tournament_name') == 'Doppio Naz. 3 tocchi' ? 'selected' : '' }}
                                        value="Doppio Naz. 3 tocchi">Doppio Naz. 3 tocchi</option>

                                    <option {{ old('tournament_name') == 'Doppio Naz. 5 tocchi' ? 'selected' : '' }}
                                        value="Doppio Naz. 5 tocchi">Doppio Naz. 5 tocchi</option>

                                    <option {{ old('tournament_name') == 'Doppio Naz. never4' ? 'selected' : '' }}
                                        value="Doppio Naz. never4">Doppio Naz. never4</option>

                                    <option {{ old('tournament_name') == 'Doubles National' ? 'selected' : '' }}
                                        value="Doubles National">Doubles National</option>

                                    <option {{ old('tournament_name') == 'Doubles  classic' ? 'selected' : '' }}
                                        value="Doubles  classic">Doubles classic</option>

                                    <option {{ old('tournament_name') == 'Doubles World Cup' ? 'selected' : '' }}
                                        value="Doubles World Cup">Doubles World Cup
                                    </option>

                                    <option {{ old('tournament_name') == 'Doubles rollerball' ? 'selected' : '' }}
                                        value="Doubles rollerball">Doubles rollerball
                                    </option>

                                    <option {{ old('tournament_name') == 'Misto Naz. Trad' ? 'selected' : '' }}
                                        value="Misto Naz. Trad">Misto Naz. Trad
                                    </option>
                                    <option {{ old('tournament_name') == 'Misto Naz. Volo' ? 'selected' : '' }}
                                        value="Misto Naz. Volo">Misto Naz. Volo
                                    </option>

                                    <option {{ old('tournament_name') == 'Misto Naz. 3 tocchi' ? 'selected' : '' }}
                                        value="Misto Naz. 3 tocchi">Misto Naz. 3 tocchi
                                    </option>


                                    <option {{ old('tournament_name') == 'Misto Naz. 5 tocchi' ? 'selected' : '' }}
                                        value="Misto Naz. 5 tocchi">Misto Naz. 5 tocchi
                                    </option>

                                    <option {{ old('tournament_name') == 'Misto Naz. Rollerball' ? 'selected' : '' }}
                                        value="Misto Naz. Rollerball">Misto Naz. Rollerball
                                    </option>

                                    <option {{ old('tournament_name') == 'Mixed National' ? 'selected' : '' }}
                                        value="Mixed National">Mixed National
                                    </option>

                                    <option {{ old('tournament_name') == 'Mixed World Cup' ? 'selected' : '' }}
                                        value="Mixed World Cup">Mixed World Cup
                                    </option>

                                    <option {{ old('tournament_name') == 'Mixed Rollerball' ? 'selected' : '' }}
                                        value="Mixed Rollerball">Mixed Rollerball
                                    </option>

                                    <option {{ old('tournament_name') == 'National World Cup' ? 'selected' : '' }}
                                        value="National World Cup">National World Cup
                                    </option>

                                    <option {{ old('tournament_name') == 'Lega a Squadre' ? 'selected' : '' }}
                                        value="Lega a Squadre">Lega a Squadre
                                    </option>

                                    <option {{ old('tournament_name') == 'Continental Cup' ? 'selected' : '' }}
                                        value="Continental Cup">Continental Cup
                                    </option>

                                    <option {{ old('tournament_name') == 'Champion Cup' ? 'selected' : '' }}
                                        value="Champion Cup">Champion Cup
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">
                                Sport Movements
                                <span style="color:#ff0000">*</span>
                            </label>
                            <div class="col-sm-10">
                                <select name="sport_movement" class="form-control custom-select">
                                    <option {{ old('sport_movement') == 'Ficb'? 'selected' :''  }} value="Ficb">Ficb
                                    </option>

                                    <option {{ old('sport_movement') == 'Licb'? 'selected' :''  }} value="Licb">Licb
                                    </option>
                                    <option {{ old('sport_movement') == 'Fas'? 'selected' :''  }} value="Fas">Fas
                                    </option>

                                    <option {{ old('sport_movement') == 'Fpicb'? 'selected' :''  }} value="Fpicb">Fpicb
                                    </option>
                                    <option {{ old('sport_movement') == 'Itsf'? 'selected' :''  }} value="Itsf">Itsf
                                    </option>
                                    <option {{ old('sport_movement') == 'P4P'? 'selected' :''  }} value="P4P">P4P
                                    </option>
                                    <option {{ old('sport_movement') == 'Wcs Garlando'? 'selected' :''  }}
                                        value="Wcs Garlando">Wcs Garlando
                                    </option>

                                    <option {{ old('sport_movement') == 'Wcs Leonhart'? 'selected' :''  }}
                                        value="Wcs Leonhart">Wcs Leonhart
                                    </option>

                                    <option {{ old('sport_movement') == 'Wcs Tornado'? 'selected' :''  }}
                                        value="Wcs Tornado">Wcs Tornado
                                    </option>
                                    <option {{ old('sport_movement') == 'Wcs R.Sport'? 'selected' :''  }}
                                        value="Wcs R.Sport">Wcs R.Sport
                                    </option>
                                    <option {{ old('sport_movement') == 'Wcs Bonzini'? 'selected' :''  }}
                                        value="Wcs Bonzini">Wcs Bonzini
                                    </option>
                                    <option {{ old('sport_movement') == 'UIFA'? 'selected' :''  }} value="UIFA">
                                        UIFA
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Player Position
                                <span style="color:#ff0000">
                                    *</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="player_position" placeholder=""
                                    value="{{ old('player_position') }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right" id="primary-popover-content"
                            data-container="body" data-toggle="popover" title="Primary color states"
                            data-placement="bottom">Add Player Career</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Page body end -->
</div>
@endsection
