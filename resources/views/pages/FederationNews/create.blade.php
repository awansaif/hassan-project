@extends('layouts.app')
@section('title')
Federation News
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
                                    <!--- <h5>Basic Form Inputs</h5>
                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <div class="card-block">
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

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Federation Movement<span
                                                style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                               <select name="federation" id="" class="form-control custom-select">
                                                   <option disabled selected class="selected disabled">choose federation ...</option>
                                                   @foreach($federations as $federation)
                                                   <option value="{{ $federation->id }}">{{ $federation->name }}</option>
                                                   @endforeach
                                               </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">News Title<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="title"
                                                    placeholder="News Title" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Date & Time<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="datetime-local" class="form-control" name="datetime"
                                                    required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Featured Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="file" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Detail<span style="color:#ff0000">
                                                    *</span></label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" cols="5" class="form-control"
                                                    placeholder="News Description" name="details" required></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right"
                                            id="primary-popover-content" data-container="body" data-toggle="popover"
                                            title="Primary color states" data-placement="bottom">Add Federation New</button>


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
