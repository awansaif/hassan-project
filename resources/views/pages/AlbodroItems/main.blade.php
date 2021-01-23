@extends('layouts.app')
@section('title')
    Albodro Items
@endsection
@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-primary">Albodoro Items List ({{ $cat->name }}) </h2>
                            </div>
                            <div class="card-body">
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
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Year</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all as $key => $one)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $one->title }}</td>
                                                    <td>
                                                        <div style="width: 100px; height:100px;">
                                                            <img src="{{ $one->image }}" class="card-img">
                                                        </div>

                                                    </td>
                                                    <td>{{ date_format(date_create($one->year), 'Y') }}</td>
                                                    <td>
                                                      
                                                      <a href="{{ route('albodro-items.edit', $one->id) }}"
                                                          class="btn btn-primary">Edit</a>
                                                      <form style="display: inline-block"
                                                          action="{{ route('albodro-items.destroy', $one->id) }}"
                                                          method="POST">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button class="btn-danger btn">Remove</button>
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
        </div>
    </div>
@endsection
