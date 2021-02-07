@extends('layouts.app')
@section('title')
Sponsor
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="mb-2">
                        <h1 class="text-secondary float-left">Sponsors</h1>
                        <a href="{{ url('add-sponsor') }}" class="btn btn-success float-right">Add Sponsor</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success mt-2">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Sponsor Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sponsors as $key => $sponsor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <div style="width: 100px; height:100px;">
                                            <img src="{{ $sponsor->sponser_image}}" class="card-img" width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text">{{ $sponsor->sponsor_description }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ $sponsor->sponsor_link }}" targer="_blank" class="btn btn-success">Link</a>
                                    </td>
                                    <td>
                                        <a href="/edit-sponsor?id={{ $sponsor->id }}" class="btn btn-primary">Edit</a>
                                        <a href="/remove-sponsor?id={{ $sponsor->id }}" class="btn btn-danger">
                                            Remove</a>
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
@endsection
