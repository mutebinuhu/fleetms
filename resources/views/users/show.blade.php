@extends('layouts.application')
@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://image.shutterstock.com/image-vector/avatar-vector-male-profile-gray-260nw-538707355.jpg">
                </div>

                <h3 class="profile-username text-center">{{$singleuser->first_name }}</h3>

                <p class="text-muted text-center">{{$singleuser->department}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$singleuser->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Registered</b> <a class="float-right">{{$singleuser->created_at}}</a>
                  </li>
                </ul>

                <a href="{{url('/users')}}" class="btn btn-primary"><b>Back</b></a>
              </div>
              <!-- /.card-body -->
            </div>
			</div>
		</div>
	</div>
@endsection