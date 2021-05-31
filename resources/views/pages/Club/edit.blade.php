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
                    <h2 class="text-center text-muted">Update Club</h2>
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
                        <input type="hidden" name="club_id" value="{{ $club->id }}">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="text-secondary">CLUB BASIC INFO</h2>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Club Name<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="text" class="form-control" name="club_name" placeholder="Club Name"
                                            value="{{ $club->name }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Club Image<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="file" class="form-control" name="club_image" accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>Club Country<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="text" class="form-control" name="country" placeholder="Country"
                                            value="{{ $club->country }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h2 class="text-secondary">CLUB DETAIL</h2>
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"
                                    required>{{ $detail? $detail->description: old('description') }}</textarea>

                                <label for="location">Location</label>

                                <input type="url" name="location" id="location" class="form-control"
                                    placeholder="Club location map link"
                                    value="{{ $detail? $detail->location: old('location') }}" required>

                                <label for="table_chara">Table Characteristics</label>
                                <textarea name="table_chara" class="form-control" id="table_chara" cols="30" rows="5"
                                    required>{{ $detail?$detail->table_chara:old('table_chara') }}</textarea>
                                <div class="form-group row">
                                    <label class="col-sm-12">Sponsors
                                        <span style="color:#ff0000">*</span>
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="file" name="sponsor[]" id="" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="sponsor[]" id="" class="form-control" accept="image/*">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="file" name="sponsor[]" id="" class="form-control" accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>
                                            Image<span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label>
                                            Name
                                            <span style="color:#ff0000">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="{{ $detail? $detail->name: old('name') }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success float-right">Update Club</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
