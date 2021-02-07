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
                    <div class="pb-2">
                        <h1 class="float-left text-secondary">Add Sponsor</h1>
                        <a href="{{ url('sponsor') }}" class="btn btn-success float-right">Back</a>
                    </div>
                    <br>
                    <br>
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
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Sponsor Name</label>
                                    <div class="col-sm-10">
                                        <textarea name="name"
                                            class="form-control">{{ old('name') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Sponsor Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label font-weight-bold">Sponsor Url</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" name="url" value="{{ old('url') }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary float-right" id="primary-popover-content"
                                    data-container="body" data-toggle="popover" title="Primary color states"
                                    data-placement="bottom">Add Sponsor</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
