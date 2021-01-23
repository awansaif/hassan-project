@extends('layouts.app')
@section('title')
    Edit Item
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

                                        @if (Session::has('message'))
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
                                        <form method="post" enctype="multipart/form-data"
                                            action="{{ route('albodro-items.update', $data->id) }}"
                                            >
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="albodro_id" value="{{ $cat->id }}" >

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Item Title<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="title"
                                                        placeholder="Item Title" required
                                                        value="{{ $data->title }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Item Image<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="image"
                                                        accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Year<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="datetime-local" class="form-control" 
                                                    value="2016-02-01T03:35" name="year" required >
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary float-right"
                                                id="primary-popover-content" data-container="body" data-toggle="popover"
                                                title="Primary color states" data-placement="bottom">
                                                Update Item
                                            </button>


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
