@extends('team.layouts.app')

@section('title')
{{ Auth::guard('admin')->user()->name }} -- Club
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="p-4">
                <h1 class="text-secondary font-weight-bold float-left">Club Detail</h1>
                <a href="{{ url('team/add-club-detail',Request::route('id')) }}"
                    class="btn btn-success float-right">Add</a>


                <div class="table-responsive">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sponsor</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $key => $club)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @foreach (json_decode($club->sponsor_images) as $item)
                                    <img src="{{ $item }}" class="float-left" alt="" width="100px" height="100px">
                                    @endforeach
                                </td>
                                <td>
                                    <img src="{{ $club->image }}" alt="" width="100px" height="100px">
                                </td>
                                <td>{{ $club->name }}</td>
                                <td>
                                    <a href="{{ url('team/remove-club-detail',$club->id) }}"
                                        class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
