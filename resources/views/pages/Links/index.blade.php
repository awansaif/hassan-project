@extends('layouts.app')
@section('title')
Links
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-secondary float-left">Links List</h2>
                        <a href="{{ Route('links.create') }}" class="btn btn-success float-right">Add Link</a>
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
                        <table class="table table-striped table-bordered nowrap" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Thumbnail</th>
                                    <th>Link</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($links as $key => $link)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $link->title }}</td>
                                    <td>
                                        <img src="{{ $link->thumbnail }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $link->link }}</td>
                                    <td>{{ $link->price }}</td>
                                    <td>
                                        <a href="{{ Route('links.edit',$link->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ Route('links.destroy',$link->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
