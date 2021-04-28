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
                                    <form method="post" action="{{ Route('countries.update',$data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Country Name<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="country_name"
                                                    placeholder="Country Name" required value="{{ $data->country }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Country Flag<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <img src="{{ $data->flag }}" alt="" width="100px" height="100px">
                                                <input type="file" class="form-control" name="flag" accept="image/*">
                                            </div>
                                        </div>


                                        <button type="submit"
                                            class="btn btn-primary float-right">{{ __('Update')}}</button>
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
