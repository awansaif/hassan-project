@extends('layouts.app')

@section('title')
Event
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
                                    <h4>Add Event </h4>
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
                                    	@if(Session::has('message'))
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
                                            <label class="col-sm-2 col-form-label">Event Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="event_image" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Secondary-Event Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="secondary_event_mage"
                                                     value="{{ old('secondary_event_mage') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Event Short Description<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <textarea rows="2" cols="5" class="form-control"
                                                    placeholder="Event Details" name="event_short_description"
                                                    >{{ old('event_short_description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Event Long Description<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <textarea rows="4" cols="5" class="form-control"
                                                    placeholder="Event Details" name="event_long_description"
                                                    >{{ old('event_long_description') }}"</textarea>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Event Price ($)<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="{{ old('event_price') }}" name="event_price"
                                                    placeholder="300 $" >
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Event Place<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="event_place"
                                                    placeholder="Rome, Italy" value="{{ old('event_place') }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Event Timing<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="datetime-local" class="form-control" name="event_timing" value="{{ old('event_timing') }}"
                                                    >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Further Detail<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" value="{{ old('further_detail') }}" class="form-control form-control-file" name="further_detail" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Latitude<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-file" name="latitude" value="{{ old('latitude') }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Longtitude<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control form-control-file" name="longtitude" value="{{ old('longtitude') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Author
                                                Name<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="aurthor_name"
                                                    placeholder="Someone" value="{{ old('aurthor_name') }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Federation
                                                Name<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="federation_name"
                                                    placeholder="Someone" value="{{ old('federation_name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Author
                                                Image<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control form-control-file" name="author_image" >
                                            </div>
                                        </div>


                                        <button type="submit" class="btn btn-primary float-right"
                                            id="primary-popover-content" data-container="body" data-toggle="popover"
                                            title="Primary color states" data-placement="bottom">Add Event</button>


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
