@extends('layouts.transportofficer.index')
@section('content')
	<!-- content -->
	<div class="section content">
	<!-- row -->
		<div class="row">
			<div class="col-12">
				<!-- header -->
				<!-- container-fluid -->
				<section class="content-header">
			      <div class="container-fluid">
			        <div class="row mb-2">
			          <div class="col-sm-6">
			            <h1>Transport Officer Dashboard</h1>
			          </div>
			          <!-- success alert -->
			             <div class="col-sm-12 col">
			             	@if(session('status'))
				              	<div class="alert alert-success alert-dismissible fade show" role="alert">
					                <strong>{{session('status')}}</strong> 
					                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					                  <span aria-hidden="true">&times;</span>
					                </button>
				            	</div>
				        	@endif
			             </div>
			            <!-- /success alert -->
			        </div>
			      </div>
			      <!-- /.container-fluid -->
    			</section>
				<!-- /header -->	
				<!-- card -->
				<div class="card">
					<div class="card-body">
						<!-- tabs -->
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Requests</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pending</a>
						  </li>
						  <li class="nav-item"tra>
						    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Approved</a>
						  </li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						 	<!-- stats -->
						 	<div class="row">
						 			<div class="col-md-12 col-sm-12 col-lg-4">
									<!-- small box -->
									 <div class="small-box bg-info">
							              <div class="inner">
							                <h3>{{$pendingRequests}}</h3>
							                <p>Pending Requests</p>
							              </div>
							              <div class="icon">
							                  <i class="fab fa-joget"></i>
							              </div>
							              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							         </div>
									<!-- /small box -->
								</div>
								<div class="col-md-12 col-sm-12 col-lg-4">
									<!-- small box -->
									<div class="small-box bg-success">
						              <div class="inner">
						                <h3>5<sup style="font-size: 20px"></sup></h3>
						                <p>Approved</p>
						              </div>
						              <div class="icon">
						                <i class="far fa-thumbs-up"></i>
						              </div>
						              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						            </div>
									<!-- /small box -->.
								</div>
								<div class="col-md-12 col-sm-12 col-lg-4">
									<!-- small box -->
									  <div class="small-box bg-danger">
							              <div class="inner">
							                <h3>0</h3>

							                <p>Rejected</p>
							              </div>
							              <div class="icon">
							                <i class="far fa-thumbs-down"></i>
							              </div>
							              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							            </div>
									<!-- /small box -->
								</div>
						 	</div>
						 	<!-- /stats -->
						 	<!-- table -->
						 	<div class="row">
					          <div class="col-12">
					            <div class="card">
					              <div class="card-header">
					                <h3 class="card-title">Repair Requests</h3>

					                <div class="card-tools">
					                  <div class="input-group input-group-sm" style="width: 150px;">
					                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

					                    <div class="input-group-append">
					                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <!-- /.card-header -->
					              <div class="card-body table-responsive p-0">
					                <table class="table table-hover text-nowrap">
					                  <thead>
					                    <tr>
					                      <th>ID</th>
					                      <th>Name</th>
					                      <th>Date</th>
					                      <th>Status</th>
					                      <th class="text-center">Action</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                  	@if($requests->isEmpty())
					                  	<p>No Requests</p>
					                  	@endif
					                  	@foreach($requests as $request)
					                    <tr>
					                      <td>{{$request->id}}</td>
					                      <td>{{$request->first_name . " " . $request->sur_name}}</td>
					                      <td>{{$request->created_at}}</td>
					                      <td>
					                      	@if($request->status == 'pending')
					                      	<p class="bg-warning bg-warning-lg text-center">Pending</p>
					                      	@else($reques->staus == 'approved')
					                      	<p class="bg-success bg-success-lg text-center">Approved</p>
					                      	@endif
					                      </td>
					                      <td class="text-center">
					                      	<a class="btn btn-primary btn-sm" href="{{action('requestscontroller@edit', $request->id)}}">
				                              <i class="fas fa-folder"></i> View
                         				 	</a>
                         				 </td>
					                    </tr>
					                    @endforeach
					                 
					                  </tbody>
					                </table>
					              </div>
					              <!-- /.card-body -->
					            </div>
					            <!-- /.card -->
					          </div>
					        </div>
											 	<!-- table -->
						 </div>

						  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						  <!-- table -->
						 	<div class="row">
					          <div class="col-12">
					            <div class="card">
					              <div class="card-header">
					                <h3 class="card-title">Repair Requests</h3>

					                <div class="card-tools">
					                  <div class="input-group input-group-sm" style="width: 150px;">
					                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

					                    <div class="input-group-append">
					                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
					                    </div>
					                  </div>
					                </div>
					              </div>
					              <!-- /.card-header -->
					              <div class="card-body table-responsive p-0">
					                <table class="table table-hover text-nowrap">
					                  <thead>
					                    <tr>
					                      <th>ID</th>
					                      <th>Name</th>
					                      <th>Date</th>
					                      <th>Status</th>
					                      <th class="text-center">Action</th>
					                    </tr>
					                  </thead>
					                  <tbody>
					                  	@if($requests->isEmpty())
					                  	<p>No Requests</p>
					                  	@endif
					                  	@foreach($requests as $request)
					                    <tr>
					                      <td>{{$request->id}}</td>
					                      <td>{{$request->first_name . " " . $request->sur_name}}</td>
					                      <td>{{$request->created_at}}</td>
					                      <td>
					                      	@if($request->status == 'pending')
					                      	<p class="bg-warning bg-warning-lg text-center">Pending</p>
					                      	@else($reques->staus == 'approved')
					                      	<p class="bg-success bg-success-lg text-center">Approved</p>
					                      	@endif
					                      </td>
					                      <td class="text-center">
					                      	<a class="btn btn-primary btn-sm" href="{{action('requestscontroller@edit', $request->id)}}">
				                              <i class="fas fa-folder"></i> View
                         				 	</a>
                         				 </td>
					                    </tr>
					                    @endforeach
					                 
					                  </tbody>
					                </table>
					              </div>
					              <!-- /.card-body -->
					            </div>
					            <!-- /.card -->
					          </div>
					        </div>
											 	<!-- table -->
						.</div>
						  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
						  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>
				</div>
				<!-- /tabs -->
			</div>
		<!-- /card -->

		</div>
	<!-- row -->
	</div>
	<!-- /content -->
@endsection