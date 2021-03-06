@extends('layouts.app')

@section('title')
Event
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
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <div class="card-block">
                                    <h4 class="sub-title"> <a href="{{ url('events') }}" class="btn btn-primary btn-sm mr-4">Back</a> Add Event</h4>
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
                                                <input type="file" class="form-control" name="event_image" accept="image/*">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Secondary-Event Image<span
                                                    style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="secondary_event_mage" accept="image/*"
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
                                                    >{{ old('event_long_description') }}</textarea>
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
                                            <label class="col-sm-2 col-form-label">Location Map Link<span style="color:#ff0000"> *</span></label>
                                            <div class="col-sm-10">
                                                <input type="url" class="form-control" name="location_map_link" value="{{ old('location_map_link') }}" placeholder="https://www.google.com/maps/place/London,+UK/@51.528308,-0.381781,10z/data=!4m13!1m7!3m6!1s0x47d8a00baf21de75:0x52963a5addd52a99!2sLondon,+UK!3b1!8m2!3d51.5073509!4d-0.1277583!3m4!1s0x47d8a00baf21de75:0x52963a5addd52a99!8m2!3d51.5073509!4d-0.1277583">

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
                                                <input type="file" class="form-control form-control-file" name="author_image" accept="image/*">
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
