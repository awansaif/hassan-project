@extends('layouts.app')

@section('title')
Collection Images
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="text-primary">Add New Collection Image</h1>
                                    <hr>
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
                                <form method="post"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Collection Name<span style="color:#ff0000"> *</span></label>
                                        <div class="col-sm-10">
                                           <select class="form-control custom-select" name="collection">
                                                <option class="disabled" selected disabled>Select collection ...</option>
                                               @foreach($collections as $collection)
                                               <option value="{{ $collection->id }}">{{ $collection->collection_name }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Collection Image<span style="color:#ff0000"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" name="collection_image_list[]" class="form-control-file form-control" multiple>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right" id="primary-popover-content" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom">Add Collection</button>
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Page body end -->
                </div>
            </div>
        </div>
    </div>
<div>

@endsection

