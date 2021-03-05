@extends('layouts.app')

@section('title')
    Federation News
@endsection

@section('content')

    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header card">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <i class="icofont icofont-file-code bg-c-blue"></i>
                                    <div class="d-inline">
                                        <h4>Add Federation News </h4>
                                        <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="page-header-breadcrumb">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                        <div class="card-header-right">
                                            <i class="icofont icofont-spinner-alt-5"></i>
                                        </div>

                                    </div>
                                    <div class="card-block">
                                        <!--- <h4 class="sub-title">Basic Inputs</h4> -->


                                        <form id="event-form" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}">
                                            @if (Session::has('message'))
                                                <div class="alert alert-success">
                                                    {{ session::get('message') }}
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
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Federation Movement<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <select name="federation" id="" class="form-control custom-select">
                                                        @foreach ($federations as $federation)
                                                            <option value="{{ $federation->id }}" @if ($federation->id == $data->federation_id)
                                                                selected
                                                        @endif

                                                        >{{ $federation->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">News Title<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="title"
                                                        placeholder="News Title" required value="{{ $data->title }}">
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Date & Time<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="datetime-local" class="form-control" name="datetime"
                                                        required
                                                        value="{{ $data->date_and_time }}"
                                                        >
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
                                                        placeholder="News Description" name="details"

                                                        required>{{ $data->detail }}</textarea>
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary float-right"
                                                id="primary-popover-content" data-container="body" data-toggle="popover"
                                                title="Primary color states" data-placement="bottom">Update Federation
                                                Event</button>


                                        </form>

                                    </div>
                                </div>
                                <!-- Basic Form Inputs card end -->




                            </div>
                        </div>
                        <!-- Page body end -->
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
