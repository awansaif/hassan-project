@extends('layouts.app')
@section('title')
Federation
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="font-weight-bold text-secondary float-left">Player Federations</h2>
                        <a href="{{ Route('federations.create') }}" class="btn btn-success float-right">Add Player
                            Federation</a>
                    </div>
                    <br>
                    <br>
                    <hr>
                    @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>FICB</th>
                                    <th>UISP</th>
                                    <th>ITSF</th>
                                    <th>LICB</th>
                                    <th>fpicb</th>
                                    <th>p4p</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($federations as $key => $federation)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ $federation->image }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $federation->player_name }}</td>
                                    <td>{{ $federation->player_rank }}</td>
                                    <td>{{ $federation->FICB }}</td>
                                    <td>{{ $federation->UISP }}</td>
                                    <td>{{ $federation->ITSF }}</td>
                                    <td>{{ $federation->LICB }}</td>
                                    <td>{{ $federation->fpicb }}</td>
                                    <td>{{ $federation->p4p }}</td>
                                    <td>
                                        <a href="{{ Route('federations.edit',$federation->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form style="display: inline-block"
                                            action="{{ Route('federations.destroy', $federation->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-danger btn">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Rank</th>
                                    <th>FICB</th>
                                    <th>UISP</th>
                                    <th>ITSF</th>
                                    <th>LICB</th>
                                    <th>fpicb</th>
                                    <th>p4p</th>
                                    <th>Action</th>
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
