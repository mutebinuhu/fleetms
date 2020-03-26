@extends('layouts.dashboard')
@section('content')
	<!-- section -->
	<div class="content">
		<!-- row -->
		<div class="row">
			<!-- col -->
			<div class="col-12 col-md-4 col-sm-12 col-lg-12">
				<!-- header -->
				 <div class="small-box bg-info">
		              <div class="inner">
						<h3>4</h3>
						<p>Pending Requests</p>
		              </div>
		              <div class="icon">
		                  <i class="fab fa-joget"></i>
		              </div>
		              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
				<!-- /header -->
			</div>
				<!-- about vehicle -->
				<div class="col-sm-12 col-lg-4 col-md-4">
					<div class="card card-primary">
						<div class="card-header">
		                	<h3 class="card-title">Vehicle Details</h3>
		              	</div>
		              <!-- /.card-header -->
		              <div class="card-body">
			                <strong><i class="fas fa-book mr-1"></i> Reg No:</strong>

			                <p class="text-muted">
			                  	@foreach($show as $show)
			                  		{{$show->reg_no}}
			                  	@endforeach	
			                </p>
			                <hr>
			                <strong><i class="fas fa-map-marker-alt mr-1"></i> Driver Name</strong>
			                <p class="text-muted">{{$show->sur_name ." " . $show->first_name}}</p>
			                <hr>
			                <strong><i class="fas fa-map-marker-alt mr-1"></i>Repair Request Date</strong>
			                <p class="text-muted">
			                	<?php
					                  $date = date_create($request->created_at);
					                  echo date_format($date, "d/m/Y");
					            ?>
			                </p>
			                <hr>
			                <strong><i class="far fa-file-alt mr-1"></i>Car Make</strong>

			                <p class="text-muted">{{$show->make}}</p>
			                <hr>
			                <strong><i class="far fa-file-alt mr-1"></i>Car Type</strong>
			                <p class="text-muted">{{$show->type}}</p>
			                <hr>
			                <strong><i class="far fa-file-alt mr-1"></i>Car Mileage</strong>
			                <p class="text-muted">{{$show->mileage}}</p>
		              </div>
		              <!-- /.card-body -->
		            </div>
        	</div>
				<!-- /about vehicle -->
				<!-- request description -->
				<div class="col-8">
					<div class="card card-primary">
						<div class="card-header">
		                	<h3 class="card-title">Request Description</h3>
		              	</div>
		              <!-- /.card-header -->
		              <div class="card-body">
		              		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								  <li class="nav-item">
								    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Request Description</a>
								  </li>
								  <li class="nav-item">
								    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Vehicle History</a>
								  </li>
								  <li class="nav-item">
								    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">More info</a>
								  </li>
								</ul>
						<div class="tab-content" id="pills-tabContent">
							  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">{{$show->description}}</div>
							  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
							  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
						</div>
					</div>
		              <!-- /.card-body -->
		            </div>
				</div>
				<!--request description -->
			</div>
			<!-- /col -->
		</div>
		<!-- /row -->
	</div>
	<!-- /section -->
@endsection