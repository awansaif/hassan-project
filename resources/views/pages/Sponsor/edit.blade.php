@extends('layouts.app')
@section('title')
Sponsor
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="mb-2">
                        <h1 class="text-center text-secondary">Update Sponsor</h1>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-10 m-auto">
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
                                <input type="hidden" name="sponsor_id" value="{{ $data->id }}">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Name</label>
                                    <div class="col-sm-10">
                                        <textarea name="name"
                                            class="form-control">{{ $data->name }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Sponsor Image</label>
                                    <div class="col-sm-10">
                                        <img src="{{ $data->sponsor_image }}" alt="" width="200px" height="200px">
                                        <br>
                                        <br>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Sponsor Url</label>
                                    <div class="col-sm-10">
                                        <input type="url" name="url" id="" class="form-control" value="{{ $data->sponsor_url }}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary float-right m-2" id="primary-popover-content"
                                    data-container="body" data-toggle="popover" title="Primary color states"
                                    data-placement="bottom">Update Sponsor</button>

                                <a href="{{ url('sponsor') }}" class="btn btn-success float-right m-2">Back</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Basic Form Inputs card end -->

    @endsection
