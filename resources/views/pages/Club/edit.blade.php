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
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-10 m-auto">
                            <a href="/club?id={{ $data->club_id }}" class="btn btn-primary float-left">Back</a>
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
                                <div class="row m-auto">
                                    <div class="col-8">
                                        <input type="hidden" name="club_id" value="{{ $data->id }}">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>Club Name<span style="color:#ff0000">
                                                        *</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Club Name" value="{{ $data->name }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>Club Image<span style="color:#ff0000">
                                                        *</span></label>
                                                <input type="file" class="form-control" name="image" accept="image/*"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label>
                                                    Club Country
                                                    <span style="color:#ff0000">*</span>
                                                </label>
                                                <input type="text" class="form-control" name="country"
                                                    placeholder="Country" value="{{ $data->country }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <h2 class="text-center text-muted">Club Image</h2>
                                        <div style="width: 200px; height:200px">
                                            <img src="{{ $data->image }}" alt="" width="100%" height="100%">
                                        </div>
                                    </div>
                                </div>
                                <hr>
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
