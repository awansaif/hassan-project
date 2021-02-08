@extends('layouts.app')
@section('title') Federation cassifiche @endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
				<!-- Page body start -->
				<div class="page-body">
					<div class="card">
						<div class="card-header">
                            <h2 class="text-primary float-left">Federation cassifiche List</h2>
                            <a href="/add-cassifiche-detail?id={{ Request('id') }}" class="float-right btn btn-success">Add Detail</a>
						</div>
						<div class="card-body">
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
                                            <th>Cassifiche</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Rank</th>
                                            <th>CIITA</th>
                                            <th>Region</th>
                                            <th>PR</th>
                                            <th>PN</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($data as $key => $cassifiche)
										<tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $cassifiche->cassifiches->leaderboard_name }}</td>
                                            <td>{{ $cassifiche->name }}</td>
                                            <td>
                                                <div style="width: 200px; height:150px;">
                                                    <img src="{{ $cassifiche->image }}" alt="" width="100%" height="auto">
                                                </div>
                                            </td>
											<td>
                                                {{ $cassifiche->player_rank }}
                                            </td>
                                            <td>
                                                {{ $cassifiche->ciita }}
                                            </td>
                                            <td>{{ $cassifiche->region }}</td>
                                            <td>{{ $cassifiche->pr }}</td>
                                            <td>{{ $cassifiche->pn }}</td>
											<td>
												<a href="/edit-detail-cassifiche?id={{ $cassifiche->id }}" class="btn btn-primary">Edit</a>
												<a href="/remove-cassifiche-detail?id={{ $cassifiche->id }}" class="btn btn-danger"> Remove</a>
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
