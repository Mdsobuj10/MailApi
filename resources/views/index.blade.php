@extends('layouts.app')
  @section('main-content')
	<div class="wrap shadow">
		<a class="btn btn-primary" href="{{route('student.index')}}">all student</a>

		<div class="card">
			<div class="card-body">
				<h2>Sign Up</h2>
				@if ($errors-> any())
					<p class="alert alert-danger">{{$errors -> first()}} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				@if (Session::has('success'))
					<p class="alert alert-success">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>
				@endif
				
				<form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{old('name')}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{old('email')}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{old('cell')}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="{{old('username')}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input name="photo" class="form-control" value="{{old('photo')}}" type="file">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	
@endsection