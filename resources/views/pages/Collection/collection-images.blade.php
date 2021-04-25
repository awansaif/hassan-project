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
                    <div class="mb-3">
                        <h2 class="text-secondary float-left">Collection Images</h2>
                        <a href="{{ url('add-collection-images')  }}" class="btn btn-success float-right">Add Images</a>
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
                                @foreach($collectionDetail as $key => $collection)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $collection->collection->collection_name }}</td>
                                    <td>
                                        @foreach(json_decode($collection->collection_images_list) as $images)
                                        <div style="width:120px; height:120px; float:left">
                                            <img src="{{ $images }}" width="100%" height="auto">
                                        </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="/remove-collection-image?id={{$collection->id}}"
                                            class="btn btn-danger">
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
