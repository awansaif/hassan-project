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
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="text-primary"> <a href="/federation-movement" class="btn btn-primary">Back</a> Add Federation</h1>

                                </div>
                                <div class="card-body">
                                    <hr>
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
                                    <form  method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="movement_id" value="{{ $data->id }}">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Name"  value="{{ $data->name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <div style="width: 200px; height: 200px;">
                                                    <img src="{{  $data->image }}" alt="" width="100%" height="auto">
                                                </div>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Latest Event<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="datetime-local" class="form-control" name="latest_event" value="{{ date("Y-m-d\TH:i:s", strtotime($data->latest_event )) }}" >
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right"
                                            id="primary-popover-content" data-container="body" data-toggle="popover"
                                            title="Primary color states" data-placement="bottom">Update Federation</button>
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
<!-- Basic Form Inputs card end -->

@endsection
