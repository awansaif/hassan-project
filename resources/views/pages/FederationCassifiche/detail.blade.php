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
							<h2 class="text-primary">Federation cassifiche List</h2>
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
                                            <th>@extends('layouts.app')
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
							<h2 class="text-primary">Federation cassifiche List</h2>
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
                                            <th>Rank</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cassifiches as $key => $cassifiche)
										<tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $cassifiche->federations->name }}</td>
                                            <td>{{ $cassifiche->leaderboard_name }}</td>
											<td>
                                                <div style="width: 100px; height:100px;">
                                                   <img src=" {{ $cassifiche->image }}" alt=""  width="100%" height="auto">
                                                </div>
                                            </td>
											<td>
                                                <a href="/detail-cassifiche?id={{ $cassifiche->id }}" class="btn btn-success">Detail</a>
												<a href="/edit-federation-cassifiche?id={{ $cassifiche->id }}" class="btn btn-primary">Edit</a>
												<a href="/remove-federation-cassifiche?id={{ $cassifiche->id }}" class="btn btn-danger"> Remove</a>
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
</th>
                                            <th>Leaderboard Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($cassifiches as $key => $cassifiche)
										<tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $cassifiche->federations->name }}</td>
                                            <td>{{ $cassifiche->leaderboard_name }}</td>
											<td>
                                                <div style="width: 100px; height:100px;">
                                                   <img src=" {{ $cassifiche->image }}" alt=""  width="100%" height="auto">
                                                </div>
                                            </td>
											<td>
                                                <a href="/detail-cassifiche?id={{ $cassifiche->id }}" class="btn btn-success">Detail</a>
												<a href="/edit-federation-cassifiche?id={{ $cassifiche->id }}" class="btn btn-primary">Edit</a>
												<a href="/remove-federation-cassifiche?id={{ $cassifiche->id }}" class="btn btn-danger"> Remove</a>
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
