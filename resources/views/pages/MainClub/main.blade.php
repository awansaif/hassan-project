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
					<div class="card">
						<div class="card-header">
                            <h2 class="text-primary float-left">Club List</h2>
                            <a href="/add-main-club" class="btn btn-success float-right">Add Club</a>
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
											<th>Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($clubs as $key => $club)
										<tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                {{ $club->club_name }}
                                            </td>
											<td>
												<a href="/edit-main-club?id={{ $club->id }}" class="btn btn-primary">Edit</a>
												<a href="/remove-main-club?id={{$club->id}}" class="btn btn-danger"> Remove</a>
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
