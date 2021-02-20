@extends('team.layouts.app')

@section('title')
{{ Auth::user()->name }} -- Dashboard
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row pt-4">
                <!-- card1 start -->
                <div class="col-4">
                    <div class="card ">
                        <div class="card-body text-center">
                            <span class="text-primary font-weight-bold">Total Club</span>
                            <h4>{{ $clubs }}</h4>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card ">
                        <div class="card-body text-center">
                            <span class="text-primary font-weight-bold">Total Player</span>
                            <h4></h4>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
