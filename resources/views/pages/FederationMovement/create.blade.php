@extends('layouts.app')
@section('title')
Federation Movement
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">

                    <div class="mb-2">
                        <a href="{{ Route('federationmovement.index') }}" class="btn btn-primary float-left">BACK</a>
                        <h2 class="text-secondary text-capitalize text-center">ADD FEDERATION MOVEMENT</h2>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-6">
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
                            <form method="post" action="{{ Route('federationmovement.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <label>CLUB
                                    <span style="color:#ff0000">*</span>
                                </label>

                                <select name="club" id="club" class="form-control custom-select">
                                    <option value="" selected disabled>Choose club for player....</option>
                                    @foreach ($clubs as $club)
                                    <optgroup label="{{ $club->club_name }}">
                                        @foreach ($club->clubs as $club)
                                        <option value="{{ $club->id }}"
                                            {{ old('club') == $club->id ? 'selected' : '' }}>{{ $club->name  }}</option>
                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>

                                <label for="name">NAME
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    value="{{ old('name') }}" id="name">

                                <label for="icon">FEDERATION ICON:
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="file" name="icon" class="form-control" id="icon" accept="image/*">

                                <label for="image">IMAGE:
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="file" name="image" class="form-control" accept="image/*" id="image">


                                <label for="latest_event">LATEST EVENT:
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="datetime-local" class="form-control" name="latest_event"
                                    value="{{ old('latest_event') }}">


                                <button type="submit" class="btn btn-success float-right mt-5">Add Federation</button>
                            </form>

                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h2 class="text-secondary text-center text-capitalize">ICON</h2>
                                    <img src="" alt="" width="100%" height="200px" id="iconPreview">
                                </div>
                                <div class="col-sm-6">
                                    <h2 class="text-secondary text-center text-capitalize">IMAGE</h2>
                                    <img src="" alt="" width="100%" height="200px" id="imagePreview">
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

@section('scripts')
<script>
    const icon = document.querySelector("#icon")
    const image = document.querySelector("#image")

    icon.addEventListener('change', (e) => {
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        document.querySelector("#iconPreview").setAttribute('src',url)
    });

    image.addEventListener('change', (e) => {
        let file = e.target.files[0];
        let url = URL.createObjectURL(file);
        document.querySelector("#imagePreview").setAttribute('src',url)
    });
</script>
@endsection
