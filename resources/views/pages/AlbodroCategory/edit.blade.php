@extends('layouts.app')
@section('title')
    Country
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
                                            action="{{ route('albodro-category.update', $data->id) }}">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Federation<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <select name="federation_id" id="" class="form-control custom-select" required>
                                                        @foreach($federations as $federation)
                                                        <option value="{{ $federation->id }}"
                                                          
                                                          {{ 
                                                            ($federation->id == $data->federation_id) ?
                                                            'selected' : ''
                                                          }}
                                                          
                                                          >{{ $federation->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Albodoro Category Title<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Albodoro Category Title" required
                                                        value="{{ $data->name }}">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Albodoro Category Image<span
                                                        style="color:#ff0000"> *</span></label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="image"
                                                        accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-primary float-right"
                                                id="primary-popover-content" data-container="body" data-toggle="popover"
                                                title="Primary color states" data-placement="bottom">
                                                Update Albodoro
                                                Category</button>


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
