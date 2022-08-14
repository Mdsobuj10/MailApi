@extends('layouts.app')
  @section('main-content')
	<div class="wrap shadow">
		<a class="btn btn-primary" href="{{route('student.index')}}">all student</a>
		<a class="btn btn-primary d-inline" href="{{route('staff.index')}}">all staff</a>


		<div class="card">
			<div class="card-body">
				<h2>Sign Up</h2>

                @if (Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}} <button class="close" data-dismiss="alert">&times;</button></p>
               @endif
            
				
				<form action="{{route('student.update', $edite_student -> id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="{{$edite_student -> name}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="{{$edite_student -> email}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="{{$edite_student -> cell}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="username" class="form-control" value="{{$edite_student -> username}}" type="text">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<input  name="new_photo" class="form-control" value="" type="file">
						<input  name="old_photo" class="form-control" value="{{$edite_student -> photo}}" type="hidden">
                        <img  id="old_photo" src="{{url('storage/student/'. $edite_student -> photo)}}" alt="">
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	
@endsection