@extends('layouts.app')
  @section('main-content')

	<div class="wrap-table shadow">
		<a class="btn btn-primary" href="{{route('staff.create')}}">add student</a>
		<div class="card">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Photo</th>
							<th id="button">Action</th>
						</tr>
					</thead>
					<tbody>
						
						@forelse ($student as $item)
						<tr>
							<td>{{$loop -> index + 1}}</td>
							<td>{{$item -> name}}</td>
							<td>{{$item -> email}}</td>
							<td>{{$item -> cell}}</td>
							<td> <img src="{{url('storage/staff/', $item ->photo )}}" alt="" class=" img-fluid">
							</td>
							<td >
								<a class="btn btn-sm btn-info" href="{{route('staff.show', $item -> id )}}">View</a>
								<a class="btn btn-sm btn-danger" href="{{route('staff.edit', $item -> id )}}">Edite</a>
								<form action="{{route('staff.destroy', $item -> id)}}" method="POST" class="d-inline">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-warning" type="submit">delete</button>
								</form>
							</td>	
						</tr>
						@empty
								<tr>
									<td>data not found</td>
								</tr>
							@endforelse


					</tbody>
				</table>
			</div>
		</div>
	</div>
	
@endsection