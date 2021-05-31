@extends('layouts.app')
@section('title')
Club Detail
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-muted float-left">Club Detail</h2>

                        {{-- <a href="/add-club-detail?id={{  Request('id') }}" class="btn btn-success ml-2
                        float-right">Add --}}
                        {{-- Detail</a> --}}
                    </div>
                    <br>
                    <br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class=" table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Club</th>
                                    <th>Sponsor</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Table Characteristic</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clubDetail as $key => $club)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $club->clubs->name }}
                                    </td>
                                    <td>
                                        @if($club->sponsor_images)

                                        @foreach(json_decode($club->sponsor_images) as $sponsor)
                                        <div style="width: 100px; height:100px; float:left;">
                                            <img src="{{ $sponsor }}" class="card-img">
                                        </div>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <div style="width: 100px; height:100px; float:left;">
                                            <img src="{{ $club->image }}" class="card-img">
                                        </div>
                                    </td>
                                    <td>
                                        {{ $club->name }}
                                    </td>
                                    <td>
                                        {{ $club->description }}
                                    </td>
                                    <td>
                                        {{ $club->location }}
                                    </td>
                                    <td>
                                        {{ $club->table_chara }}
                                    </td>
                                    {{-- <td><a href="/edit-club?id={{ $club->id }}" class="btn btn-primary">Edit
                                    </a>
                                    --}}
                                    {{-- <a href="/remove-club-detail?id={{$club->id}}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete this?')">
                                    Remove</a>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Club</th>
                                    <th>Sponsor</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Location</th>
                                    <th>Table Characteristic</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
