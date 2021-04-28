@extends('layouts.app')

@section('title')
Dashboard
@endsection
@section('content')
<!-- Pre-loader end -->
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-video-camera bg-c-blue card1-icon"></i>
                                    <span class="text-c-blue f-w-600">Total Videos</span>
                                    <h4>{{ $videos}} </h4>
                                    <div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-user bg-c-pink card1-icon"></i>
                                    <span class="text-c-pink f-w-600">Federations</span>
                                    <h4>{{ $federations }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-shopping-cart bg-c-green card1-icon"></i>
                                    <span class="text-c-green f-w-600">Total Products</span>
                                    <h4>{{ $products }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                        <!-- card1 start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card widget-card-1">
                                <div class="card-block-small">
                                    <i class="ti-user bg-c-yellow card1-icon"></i>
                                    <span class="text-c-yellow f-w-600">Total Users</span>
                                    <h4>{{ $users }}</h4>
                                </div>
                            </div>
                        </div>
                        <!-- card1 end -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <password-change></password-change>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data widget End -->
@endsection
