@extends('layouts.app')
@section('title')
Stream
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
                            <h4>Live Stream </h4>
                            <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="page-header-breadcrumb">
                       <!---- <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a>
                            </li>
                        </ul>  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                           <!--- <h5>Basic Form Inputs</h5>
                            <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                            <div class="card-header-right"><i
                                class="icofont icofont-spinner-alt-5"></i></div>

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
                               <form id="event-form" method="post"  enctype="multipart/form-data">
                               	@csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Stream Featured Image<span style="color:#ff0000"> *</span></label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="stream_featured_image" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Match Details<span style="color:#ff0000"> *</span></label>
                                                    <div class="col-sm-10">
                                                        <textarea rows="2" cols="5" class="form-control"
                                                        placeholder="Match Details" name="match_detail" > {{ old('match_detail') }}</textarea>
                                                    </div>
                                                </div>
                                    
                                        
                                            
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Sports Club Image<span style="color:#ff0000"> *</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control" name="sports_club_image" >
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Active Users<span style="color:#ff0000"> </span></label>
                                                    <div class="col-sm-10 col-form-label">
                                                    <label style="color:green">No. of Active Users will be displayed here.</label>
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-primary float-right" id="primary-popover-content" data-container="body" data-toggle="popover" title="Primary color states" data-placement="bottom">Add Stream</button>


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