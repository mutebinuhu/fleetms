@extends('layouts.dashboard')
@section('content')
	<!-- section -->
	<div class="content">
		<!-- row -->
		<div class="row">
			<!-- col -->
				<!-- about vehicle -->
				<div class="col-sm-12 col-lg-4 col-md-4 my-2">
					<div class="card card-primary">
						<div class="card-header">
		                	<h3 class="card-title">Vehicle Details</h3>
		              	</div>
		              <!-- /.card-header -->
		              <div class="card-body">
			                <strong><i class="fas fa-car mr-1"></i>Reg No:</strong>

			                <p class="text-muted">
			                  	@foreach($show as $show)
			                  		{{$show->reg_no}}
			                  	@endforeach	
			                </p>
			                <hr>
			                <strong><i class="far fa-user mr-1"></i>Driver's Name</strong>
			                <p class="text-muted">{{$show->sur_name ." " . $show->first_name}}</p>
			                <hr>
			                <strong><i class="fas fa-toolbox mr-1"></i>Repair Request Date</strong>
			                <p class="text-muted">{{$show->created_at}}</p>
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
				<div class="col-lg-8 col-md-12 col-sm-12 my-2">
					<div class="card card-primary">
						<div class="card-header">
		                	<h3 class="card-title">Request Description</h3>
		              	</div>
			              <!-- /.card-header -->
			              <!-- card body -->
			              	<div class="card-body">
			              		<!-- pills -->
			              		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
									  <li class="nav-item">
									    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
									  </li>
									  <li class="nav-item">
									    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
									  </li>
								</ul>
								<div class="tab-content" id="pills-tabContent">
								<!-- vehicle form -->
								  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								  		klkk
								  </div>
								<!-- /vehicle form -->

								  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">.you</div>
								  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">.yah</div>
								</div>
			              		<!-- /pills -->
							
							</div>
						<!-- card body -->
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