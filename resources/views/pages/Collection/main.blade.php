@extends('layouts.app')
@section('title')
Collection
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">

                    <div class="mb-2">
                        <h2 class="text-seondary float-left">Collection List</h2>
                        <a href="{{ url('add-collection') }}" class="btn btn-success float-right">Add Collection</a>
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
                                    <th>Collection</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($collections as $key => $collection)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $collection->collection_name }}</td>
                                    <td>
                                        <div style="width:200px; height:200px;">
                                            <img src="{{ $collection->collection_image }}" width="100%" height="auto">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/edit-collection?id={{$collection->id}}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="/remove-collection?id={{$collection->id}}" class="btn btn-danger">
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
</div>
@endsection
