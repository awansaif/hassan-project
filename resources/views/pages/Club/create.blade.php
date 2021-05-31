@extends('layouts.app')
@section('title')
Club
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body pb-4">
                    <a href="/club?id={{ Request('id') }}" class="btn btn-primary float-left">Back</a>
                    <h2 class="text-center text-muted">Add Club</h2>
                    <hr>
                    <form method="post" enctype="multipart/form-data">
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
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="text-secondary">CLUB BASIC INFO</h2>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Club Name<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="text" class="form-control" name="club_name" placeholder="Club Name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Club Image<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="file" class="form-control" name="club_image" accept="image/*"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Club Country<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="text" class="form-control" name="country" placeholder="Country"
                                            value="{{ old('country') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h2 class="text-secondary">CLUB DETAIL</h2>
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                                    required>{{ old('description') }}</textarea>
                                <label for="location">Location</label>
                                <input type="url" name="location" id="location" class="form-control"
                                    placeholder="Club location map link" value="{{ old('location') }}" required>
                                <label for="table_chara">Table Characteristics</label>
                                <textarea name="table_chara" class="form-control" id="table_chara" cols="30" rows="5"
                                    required>{{ old('table_chara') }}</textarea>
                                <div class="form-group row">
                                    <label class="col-sm-12">Sponsors
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="sponsor[]" id="" class="form-control" accept="image/*"
                                            required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="sponsor[]" id="" class="form-control" accept="image/*"
                                            required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="sponsor[]" id="" class="form-control" accept="image/*"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>
                                            Image<span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="file" class="form-control" name="image" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>
                                            Name
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success float-right">Add Club</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection