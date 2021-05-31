@extends('layouts.app')
@section('title')
Club
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">

                    <div class="mb-2">
                        <h2 class="text-secondary float-left">MAIN CLUB</h2>
                        <a href="{{ Route('mainclub.create') }}" class="btn btn-success float-right">Add Main Club</a>
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
                                    <th><i class="ti-view-list"></i></th>
                                    <th>Name</th>
                                    <th>Child Club</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clubs as $key => $club)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>
                                        {{ $club->club_name }}
                                    </td>
                                    <td>
                                        <a href="/club?id={{ $club->id }}" class="btn btn-success">Clubs</a>
                                    </td>
                                    <td>
                                        <a href="{{ Route('mainclub.edit',$club->id) }}"
                                            class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ Route('mainclub.destroy', $club->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete this. All related data also destroy.')">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><i class="ti-view-list"></i></th>
                                    <th>Name</th>
                                    <th>Child Club</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection