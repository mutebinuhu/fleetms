@extends('layouts.dashboard')
@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-3">
				<div class="card card-primary card-outline my-5">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://previews.123rf.com/images/jovanas/jovanas1606/jovanas160600554/59285177-car-icon-with-long-shadow.jpg">
                </div>

                <h3 class="profile-username text-center">Car Details</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Reg No</b> <a class="float-right">{{$singlevehicle->reg_no}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Make</b> <a class="float-right">{{$singlevehicle->make}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Eng No</b> <a class="float-right">{{$singlevehicle->eng_no}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Type</b> <a class="float-right">{{$singlevehicle->type}}</a>
                  </li><li class="list-group-item">
                    <b>Mileage</b> <a class="float-right">{{$singlevehicle->mileage}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Year</b> <a class="float-right">{{$singlevehicle->year}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>created</b> <a class="float-right">{{$singlevehicle->created_at}}</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
			</div>
		</div>
	</div>
@endsection