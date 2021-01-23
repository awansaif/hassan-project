@extends('layouts.app')
@section('title')
Albodoro
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
                                    <form method="post" enctype="multipart/form-data" action="{{ route('albodro-category.store') }}">
                                      @csrf
                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Albodoro Category Title<span
                                                  style="color:#ff0000"> *</span></label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" name="name"
                                                  placeholder="Albodoro Category Title" required
                                                  value="{{ old('name') }}">
                                          </div>
                                      </div>

                                      <div class="form-group row">
                                          <label class="col-sm-2 col-form-label">Albodoro Category Image<span
                                                  style="color:#ff0000"> *</span></label>
                                          <div class="col-sm-10">
                                              <input type="file" class="form-control" name="image" >
                                          </div>
                                      </div>


                                      <button type="submit" class="btn btn-primary float-right"
                                          id="primary-popover-content" data-container="body" data-toggle="popover"
                                          title="Primary color states" data-placement="bottom">Add Albodoro Category</button>


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

