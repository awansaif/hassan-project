@extends('layouts.app')
@section('title') Stream @endsection
@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
				<!-- Page body start -->
				<div class="page-body">
					<div class="card">
						<div class="card-header">
							<h2 class="text-primary">Streams List</h2>
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
											<th>Stream Featured Image</th>
                                            <th>Match Details</th>
                                            <th>Sports Club Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($streams as $key => $stream)
										<tr>
											<td>{{ $key + 1 }}</td>
											<td>
                                                <div style="width: 100px; height:100px;">
                                                    <img src="{{ $stream->stream_featured_image}}" class="card-img">
                                                </div>
                                            </td>
                                            <td> <p> {{ $stream->match_details }}</p></td>
											<td>
                                                <div style="width: 100px; height:100px;">
                                                    <img src="{{ $stream->sports_club_image}}" class="card-img">
                                                </div>
                                            </td>
											<td>
												<a href="/edit-stream?id={{$stream->id}}" class="btn btn-primary">Edit</a>
												<a href="/remove-stream?id={{$stream->id}}" class="btn btn-danger"> Remove</a>
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
