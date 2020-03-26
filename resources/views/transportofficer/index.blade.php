@extends('layouts.dashboard')
@section('content')
	<!-- content -->
	<div class="section content">
	<!-- row -->
		<div class="row">
			<div class="col-12">
				<!-- card -->
				<div class="card">
					<div class="card-body">
						<!-- tabs -->
					<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
						  <li class="nav-item">
						    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Requests</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">In Progress</a>
						  </li>
						  <li class="nav-item"tra>
						    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Complete</a>
						  </li>
						    <li class="nav-item"tra>
						    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-rejected" role="tab" aria-controls="pills-contact" aria-selected="false">Rejected</a>
						  </li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						 <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						 	<!-- stats -->
						 	<div class="row">
						 		<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									 <div class="small-box bg-warning">
							              <div class="inner">
							                <h3>{{$pendingRequests}}</h3>
							                <p>Pending Requests</p>
							              </div>
							              <div class="icon">
							                  <i class="fas fa-pause"></i>
							              </div>
							              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							         </div>
									<!-- /small box -->
								</div>
						 			<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									 <div class="small-box bg-info">
							              <div class="inner">
							                <h3>{{$pendingRequests+$countapproved+$countrejected}}</h3>
							                <p>Total Requests</p>
							              </div>
							              <div class="icon">
							                  <i class="fab fa-joget"></i>
							              </div>
							              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							         </div>
									<!-- /small box -->
								</div>
								<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									<div class="small-box bg-success">
						              <div class="inner">
						                <h3>{{$countapproved}}<sup style="font-size: 20px"></sup></h3>
						                <p>Complete</p>
						              </div>
						              <div class="icon">
						                <i class="far fa-thumbs-up"></i>
						              </div>
						              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						            </div>
									<!-- /small box -->.
								</div>
								<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									  <div class="small-box bg-danger">
							              <div class="inner">
							                <h3>{{$countrejected}}</h3>

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
					                      <th>Driver</th>
					                      <th>Request Date</th>
					                      <th>Reg No</th>
					                       <th>Type</th>

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
					                      <td>{{$request->first_name . " " . $request->sur_name}}</td>
					                      <td>
					                      	<?php
					                      		 $date = date_create($request->created_at);
					                      		 echo date_format($date, "d/m/Y");
					                      	 ?>
					                      </td>
					                      <td><?php echo strtoupper($request->reg_no) ?></td>
					                      <td>{{$request->type}}</td>

					                      <td>
					                      	@switch($request->status)
					                      		@case(0)
					                      		<p class="bg-warning bg-warning text-center"><i class="fas fa-pause"> </i> In Progress</p>
					                      		@break
					                      		@case(1)
					                      		<p class="bg-success  text-center"><i class="fas fa-check-circle"> </i> Completed</p>
					                      		@break
					                      		@case(2)
					                      		<p class="bg-danger text-center"><i class="fas fa-window-close"> </i> Rejected</p>
					                      		@break
					                      	@endswitch
					                      </td>
					                      <td class="text-center">
					                      	<a class="btn btn-primary btn-sm" href="{{action('requestscontroller@edit', $request->id)}}">
				                              <i class="fas fa-eye"></i> View
                         				 	</a>
                         				 </td>
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
					          <div class="col-md-12 col-lg-12">
					          		<!-- stats -->
						 	<div class="row">
						 		<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									 <div class="small-box bg-warning">
							              <div class="inner">
							                <h3>0</h3>
							                <p>Pending LPO Requests</p>
							              </div>
							              <div class="icon">
							                  <i class="fas fa-pause"></i>
							              </div>
							              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							         </div>
									<!-- /small box -->
								</div>
						 			<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									 <div class="small-box bg-info">
							              <div class="inner">
							                <h3>0</h3>
							                <p>Pending Verification Requests</p>
							              </div>
							              <div class="icon">
							                  <i class="fab fa-joget"></i>
							              </div>
							              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							         </div>
									<!-- /small box -->
								</div>
								<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									<div class="small-box bg-success">
						              <div class="inner">
						                <h3>0<sup style="font-size: 20px"></sup></h3>
						                <p>Pending Works Requests</p>
						              </div>
						              <div class="icon">
						                <i class="far fa-thumbs-up"></i>
						              </div>
						              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						            </div>
									<!-- /small box -->.
								</div>
								<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									  <div class="small-box bg-danger">
							              <div class="inner">
							                <h3>0</h3>

							                <p>Pending Payments Requests</p>
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
					            <div class="card">
					              <div class="card-header">

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
					                  	<!--checks to output only pending status-->
					                  	@if($request->status == 0)
					                    <tr>
					                      <td>{{$request->id}}</td>
					                      <td>{{$request->first_name . " " . $request->sur_name}}</td>
					                      <td>
					                      	<?php
					                      		 $date = date_create($request->created_at);
					                      		 echo date_format($date, "d/m/Y");
					                      	 ?>
					                      </td>
					                      <td>
					                      	@if($request->status == 0)
					                      	<p class="bg-warning bg-warning-lg text-center"><i class="fas fa-pause"> </i>Pending</p>
					                      	@endif
					                      </td>
					                      <td class="text-center">
					                      	<a class="btn btn-primary btn-sm" href="{{action('requestscontroller@edit', $request->id)}}">
				                              <i class="fas fa-folder"></i> View
                         				 	</a>
                         				 </td>
					                    </tr>
					                    @endif
					                  	<!--checks to output only pending status-->
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
						<!-- approved requests -->
						  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="row">
						          <div class="col-12">
						            <div class="card">
						              <div class="card-header">

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
					                      <th>Reg No</th>
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
					                  	<!--checks to output only pending status-->
					                  	@if($request->status == 1)
					                    <tr>
					                      <td>{{$request->id}}</td>
					                      <td>{{$request->first_name . " " . $request->sur_name}}</td>
					                      <td>{{$request->reg_no}}</td>

					                      <td>
					                      	<?php $date=date_create($request->created_at);
                                             echo date_format($date, "d/m/Y"); ?>	
                                          </td>

					                      <td>
					                      	@if($request->status == 1)
					                      	<p class="bg-success bg-succe-lg text-center"><i class="fas fa-check-circle mr-2"></i>Complete</p>
					                      	@endif
					                      </td>
					                      <td class="text-center">
					                      	<a class="btn btn-primary btn-sm" href="{{action('requestscontroller@edit', $request->id)}}">
				                              <i class="fas fa-folder"></i> View
                         				 	</a>
                         				 </td>
					                    </tr>
					                    @endif
					                  	<!--checks to output only pending status-->
					                    @endforeach
					                  </tbody>
					                </table>
						              </div>
						              <!-- /.card-body -->
						            </div>
						            <!-- /.card -->
						          </div>
						        </div>
							</div>
						<!-- /end approved requests -->
						<!-- rejected -->
						<div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-contact-tab">
							<div class="row">
						          <div class="col-12">
						            <div class="card">
						              <div class="card-header">

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
					                  	<!--checks to output only pending status-->
					                  	@if($request->status == 2)
					                    <tr>
					                      <td>{{$request->id}}</td>
					                      <td>{{$request->first_name . " " . $request->sur_name}}</td>
					                      <td>
					                      	<?php
					                      		 $date = date_create($request->created_at);
					                      		 echo date_format($date, "d/m/Y");
					                      	 ?>
					                      </td>
					                      <td>
					                      	@if($request->status == 2)
					                      	<p class="bg-danger bg-succe-lg text-center"><i class="far fa-thumbs-down mr-2"></i>Rejected</p>
					                      	@endif
					                      </td>
					                      <td class="text-center">
					                      	<a class="btn btn-primary btn-sm" href="{{action('requestscontroller@edit', $request->id)}}">
				                              <i class="fas fa-folder"></i> View
                         				 	</a>
                         				 </td>
					                    </tr>
					                    @endif
					                  	<!--checks to output only pending status-->
					                    @endforeach
					                  </tbody>
					                </table>
						              </div>
						              <!-- /.card-body -->
						            </div>
						            <!-- /.card -->
						          </div>
						        </div>
							</div>
						<!-- /rejected -->
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