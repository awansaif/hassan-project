@extends('layouts.app')
@section('title')
Club Classification
@endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="mb-2">
                        <h2 class="text-muted float-left">Club Classification</h2>
                        <a href="{{ Route('club-classification.create') }}" class="btn btn-success ml-2 float-right">
                            Add Classification
                        </a>
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
                                    <th>Club</th>
                                    <th>Name</th>
                                    <th>Citta</th>
                                    <th>Regione</th>
                                    <th>Serie A</th>
                                    <th>Serie B</th>
                                    <th>Serie C</th>
                                    <th>Volo</th>
                                    <th>Trad</th>
                                    <th>Ball</th>
                                    <th>Italia</th>
                                    <th>Champian Cup</th>
                                    <th>Trofee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classification as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data->club? $data->club->name : '' }}</td>
                                    <td>
                                        {{ $data->name }}
                                    </td>
                                    <td>
                                        {{ $data->citta }}
                                    </td>
                                    <td>
                                        {{ $data->regione }}
                                    </td>
                                    <td>{{ $data->serie_a }}</td>

                                    <td>{{ $data->serie_b }}</td>
                                    <td>{{ $data->serie_c }}</td>
                                    <td>{{ $data->volo }}</td>
                                    <td>{{ $data->trad }}</td>
                                    <td>{{ $data->ball }}</td>
                                    <td>{{ $data->italia }}</td>
                                    <td>{{ $data->champian_cup  }}</td>
                                    <td>{{ $data->trofee }}</td>
                                    <td>
                                        <a href="{{ Route('club-classification.edit', $data->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <form action="{{ Route('club-classification.destroy', $data->id) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete this?')">Remove</button>
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
</div>
@endsection
