@extends('layouts.app')
@section('title')
Main Clubs
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row mt-5">
                        <div class="col-sm-6 m-auto">
                            <a href="{{ Route('mainclub.index') }}" class="btn btn-primary float-left">Back</a>
                            <h2 class="text-center text-muted">Add Main Club</h2>
                            <hr>
                            <form method="post" action="{{ Route('mainclub.store') }}" enctype="multipart/form-data">
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
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="">Name<span style="color:#ff0000">
                                                *</span></label>
                                        <input type="text" class="form-control" name="name" placeholder="Main club name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success float-right">Add Main Club</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic Form Inputs card end -->

@endsection
