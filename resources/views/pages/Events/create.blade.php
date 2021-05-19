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
                <div class="page-body pb-4">

                    <h4 class="sub-title ">
                        <a href="{{ Route('event.index') }}" class="btn btn-primary btn-sm mr-4">Back</a>
                        <span class="text-center">Add Event</span>
                    </h4>
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
                    <form method="post" action="{{ Route('event.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <label class="col-form-label">Event Image<span style="color:#ff0000">
                                        *</span></label>
                                <input type="file" class="form-control" name="event_image" id="event-image"
                                    accept="image/*">

                                <label class="col-form-label">Secondary-Event Image
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="file" class="form-control" name="secondary_image" id="secondary-image"
                                    accept="image/*">
                                <label class="col-form-label">Event Short Description
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <textarea rows="2" cols="5" class="form-control" placeholder="Event Details"
                                    name="event_short_description">{{ old('event_short_description') }}</textarea>

                                <label class="col-form-label">Event Long Description
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <textarea rows="4" cols="5" class="form-control" placeholder="Event Details"
                                    name="event_long_description">{{ old('event_long_description') }}</textarea>


                                <label class="col-form-label">Event Price ($)
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="text" class="form-control" value="{{ old('event_price') }}"
                                    name="event_price" placeholder="300 $">
                                <label class="col-form-label">Event Place
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="text" class="form-control" name="event_place" placeholder="Rome, Italy"
                                    value="{{ old('event_place') }}">
                                <label class="col-form-label">Event Timing
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="datetime-local" class="form-control" name="event_timing"
                                    value="{{ old('event_timing') }}">
                                <label class="col-form-label">Further Detail
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="text" class="form-control form-control-file" name="further_detail"
                                    value="{{ old('further_detail') }}">

                                <label class="col-form-label">Location Map Link
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="url" class="form-control" name="location_map_link"
                                    value="{{ old('location_map_link') }}"
                                    placeholder="https://www.google.com/maps/place/London,+UK/@51.528308,-0.381781,10z/data=!4m13!1m7!3m6!1s0x47d8a00baf21de75:0x52963a5addd52a99!2sLondon,+UK!3b1!8m2!3d51.5073509!4d-0.1277583!3m4!1s0x47d8a00baf21de75:0x52963a5addd52a99!8m2!3d51.5073509!4d-0.1277583">

                                <label class="col-form-label">Zip Code
                                    <span style="color:#ff0000">*</span>
                                </label>
                                <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}"
                                    placeholder="Zip Code">

                                <label class=" col-form-label">Author Name
                                    <span style="color:#ff0000"> *</span>
                                </label>
                                <input type="text" class="form-control" name="aurthor_name" placeholder="Author Name"
                                    value="{{ old('aurthor_name') }}">

                                <label class="col-form-label">Federation Name
                                    <span style="color:#ff0000"> *</span>
                                </label>
                                <input type="text" class="form-control" name="federation_name"
                                    placeholder="Federation Name" value="{{ old('federation_name') }}">
                                <label class="col-form-label">Author Image
                                    <span style="color:#ff0000"> *</span>
                                </label>
                                <input type="file" class="form-control form-control-file" name="author_image"
                                    accept="image/*" id="author-image">
                            </div>
                            <div class="col-sm-4">
                                <div style="width:100%; height: 250px; margin-bottom: 10px;">
                                    <h5 class="text-center">Event Image</h5>
                                    <img id="event-image-dsp" src="" alt="" width="100%" height="90%">
                                </div>
                                <div style="width:100%; height: 250px; margin-bottom: 10px;">
                                    <h5 class="text-center">Event Secondary Image</h5>
                                    <img id="secondary-image-dsp" src="" alt="" width="100%" height="90%">
                                </div>
                                <div style="width:100%; height: 250px; margin-bottom: 10px;">
                                    <h5 class="text-center">Author Image</h5>
                                    <img id="author-image-dsp" src="" alt="" width="100%" height="100%">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Add Event</button>
                    </form>

                </div>
            </div>
            <!-- Basic Form Inputs card end -->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const authorImage = document.querySelector('#author-image')
    const authorImageDsp = document.querySelector("#author-image-dsp")
    const eventImage = document.querySelector('#event-image')
    const eventImageDsp = document.querySelector("#event-image-dsp")
    const secondaryImage = document.querySelector('#secondary-image')
    const secondaryImageDsp = document.querySelector("#secondary-image-dsp")

    authorImage.addEventListener('change', (e) => {
        preview(e,authorImageDsp);
    });

    eventImage.addEventListener('change', (e) => {
        preview(e,eventImageDsp);
    });
    secondaryImage.addEventListener('change', (e) => {
        preview(e,secondaryImageDsp);
    });

    function preview(image=null, place=null)
    {
        if(image.target.files.length == 0)
        {
        return;
        }
        let file = image.target.files[0]
        let url = URL.createObjectURL(file)
        place.setAttribute('src',url)
    }
</script>
@endsection
