@extends('layouts.app')
  @section('main-content')
	<div class="row ">
        <div class="col-md-4 m-auto">
            <div class="card bg-info">
                <div class="card-body text-center">
                    <img src="{{url('storage/staff/', $student ->photo )}}" alt="" class=" shadow rounded-circle img-fluid">
                    <h3>{{$student ->name}}</h3>
                    <h4>{{$student ->email}}</h4>
                    <p>{{$student ->cell}}</p>
                </div>
                <div class="card-foder">
                    <a class="btn btn-primary text-center" href="{{route('staff.index')}}">back</a>

                </div>
            </div>
        </div>
    </div>
@endsection