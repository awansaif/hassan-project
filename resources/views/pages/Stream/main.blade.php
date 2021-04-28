@extends('layouts.app')
@section('title') Stream @endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="pb-2">
                        <h2 class="text-secondary float-left">Streams</h2>
                        <a href="{{ Route('streams.create') }}" class="btn btn-success float-right">Add Stream</a>
                    </div>
                    <br>
                    <hr>
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Featured Image</th>
                                    <th>Title</th>
                                    <th>Live Stream Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($streams as $key => $stream)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ $stream->featured_image}}" width="100px" height="100px">
                                    </td>
                                    <td>
                                        <p> {{ $stream->title }}</p>
                                    </td>
                                    <td>
                                        {{ $stream->stream_path }}
                                    </td>
                                    <td>
                                        <a href="{{ Route('streams.edit', $stream->id ) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ Route('streams.destroy',$stream->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">{{ __('Remove') }}</button>
                                        </form>
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
