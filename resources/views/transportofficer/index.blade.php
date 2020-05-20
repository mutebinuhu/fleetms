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
						  <li class="nav-item">
						    <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Request</button>
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
					                      				<p class="bg-warning bg-warning text-center"><i class="fas fa-pause"> </i>  New Request</p>
					                      				@break
					                      		@case(1)
					                      				<p class="bg-info text-center"><i class="fas fa-pause"> </i>   Approved</p>
					                      				@break
					                      		@case(2)
					                      				<p class="bg-danger text-center"><i class="fas fa-pause"> </i>  Rejected</p>
					                      				@break
					                      		@case(3)
					                      				<p class="bg-secondary text-center"><i class="fas fa-pause"> </i>Kept Inview</p>
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
							                <p>Approved (Pending LPO)</p>
							              </div>
							              <div class="icon">
							                  <i class="fab fa-joget"></i>
							              </div>
							              <!-- this triggers the modal to show the pendingLporequests  the modal is down-->
							              <a href="#" class="small-box-footer"  data-toggle="modal" data-target="#pendinglporequests">More info <i class="fas fa-arrow-circle-right"></i>
							              </a>
							              <!-- /this triggers the modal to show the pendingLporequests -->

							         </div>
									<!-- /small box -->
								</div>
								<div class="col-md-12 col-sm-12 col-lg-3">
									<!-- small box -->
									<div class="small-box bg-success">
						              <div class="inner">
						                <h3>0<sup style="font-size: 20px"></sup></h3>
						                <p>MoWT Verified Repairs</p>
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
							                <p>Pending Payment</p>
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
					                  	@if($request->status == 1)
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
					                      	@if($request->status == 1)
					                      	<p class="bg-warning bg-warning-lg text-center"><i class="fas fa-pause"> </i> Pending LPO</p>
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
							<div class="card">
              <div class="card-header">
                <h3 class="card-title">Rejected Requests</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                       <th>ID</th>
	                   <th>Name</th>
	                   <th>Reg No</th>
	                   <th>Date</th>
	                   <th>Status</th>
	                </tr>
                  </thead>
                  <tbody>
                   @foreach($rejectedRequests as $reject)
                    <tr>
                    	<td>{{$reject->id}}</td>
                    	<td>{{$reject->sur_name ." " . $reject->first_name}}</td>
                    	<td>{{$reject->reg_no}}</td>
                    	<td>
                    		<?php $date=date_create($request->created_at);
                              echo date_format($date, "d/m/Y"); ?> 	
                        </td>
                        <td>
                        	@if($reject->status == 2)
                        	<p>Rejected</p>
                        	@endif
                        </td>


                    </tr> 
                   @endforeach 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
		</div>
						<!-- /rejected -->
					</div>
				</div>
				<!-- /tabs -->
			</div>
		<!-- /card -->
		<!-- request modal -->
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<h5 class="modal-title" id="exampleModalLabel">Create Request</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
        		 <div class="container">
                    <div class="row">
                      <div class=" col-sm-12  col-12  col-md-12 col-lg-12">
                        <!-- form -->
                          <form method="POST" action="{{ route('requests.store') }}" autocomplete="off" >
                            @csrf
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <label>Reg No:</label>
                                    <select class="select2 custom-select custom-select-lg mb-3 @error('reg_no') is-invalid @enderror" name="vehicle_id">
                                    <option></option>
                                    @foreach($getdata as $regno)
                                    <option value="{{$regno->vehicle_id}}">{{$regno->reg_no}}</option>
                                    @endforeach
                                    </select>
                                    @error('reg_no')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                               </div>
                               <div class="form-row">
                                  <div class="form-group col-12 col-md-12 col-lg-12">
                                      <label for="description">Request Description</label>
                                      <textarea class="form-control @error('description') is-invalid @enderror" name="description"rows="3"></textarea>
                                  </div>
                                   @error('description')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="modal-footer">
        						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        						<button type="submit" class="btn btn-primary">Save changes</button>
      						</div>
                          </form>
                      </div>
                    </div>
                  </div>
                  <!-- /request form -->
      		</div>
    		</div>
  		</div>
		</div>
		<!-- /request modal -->
		</div>
	<!-- row -->
<!-- pending lpo -->
<!-- Modal -->
<div class="modal fade" id="pendinglporequests" tabindex="-1" role="dialog" aria-labelledby="pendinglporequests" aria-hidden="true">
  <div class="modal-dialog  modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pendinglporequests">Pendng  LPO Requests</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		<!-- lpo table -->
     		<div class="card">
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                       <th>ID</th>
	                   <th>Name</th>
	                   <th>Reg No</th>
	                   <th>Date</th>
	                   <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allRequests as $pendingLpoRequest)
		                    <tr>
		                    	@if($pendingLpoRequest->status==1)
		                    	<?php $x = count($pendingLpoRequest->status==1) ?>
		                    	<td>{{$pendingLpoRequest->id}}</td>
		                    	<td>{{$pendingLpoRequest->sur_name . " " . $pendingLpoRequest->first_name}}</td>
		                    	<td>{{$pendingLpoRequest->reg_no}}</td>
		                    	 <td>
					                 <?php $date=date_create($request->created_at);
                                      echo date_format($date, "d/m/Y"); ?>	
                                 </td>
                                 <td>
                                 	<a href="{{action('requestscontroller@edit', $request->id)}}" class="btn bg-info">Upload Lpo</a>
                                 </td>
		                    	@endif
		                    </tr>
                    @endforeach
                     
                                        
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
     		<!-- /lpo table -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	</div>
	<!-- /pending lpo -->
	<!-- /content -->
	<!-- Large modal -->


@endsection