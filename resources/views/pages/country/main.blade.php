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
                    <div class="mb-3">
                        <h2 class="text-secondary float-left">Country List</h2>
                        <a href="{{ url('add-country') }}" class="btn btn-success float-right">Add Country</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Flag</th>
                                    <th>Country Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($countries as $key => $country)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src="{{ $country->flag}}" class="card-img">
                                        </div>

                                    </td>
                                    <td>{{ $country->country }}</td>
                                    <td>
                                        <a href="/edit-country?id={{ $country->id }}" class="btn btn-primary">Edit</a>
                                        <a href="/remove-country?id={{$country->id}}" class="btn btn-danger"> Remove</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
