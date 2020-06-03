@extends('layouts.dashboard')
@section('content')
	<!-- content -->
	<div class="section content">
	<!-- container-->
		<div class="container">
			<!-- request details -->
			<div class="row">
				<div class="col-md-4">		
            <!-- Widget: user widget style 1 -->
            @foreach($carAndDriverDetails as $details)

            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{$details->sur_name . " ". $details->first_name}}</h3>
                <h5 class="widget-user-desc">{{$details->role}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{asset('/img/avatar5.png')}}" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Reg No</h5>
                      <span class="description-text">{{$details->reg_no}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">Car Make</h5>
                      <span class="description-text">{{$details->make}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">Car Type</h5>
                      <span class="description-text">{{$details->type}}</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          @endforeach
				<div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="">
                      	@foreach($errors->all() as $error)
                      	<!--errors -->
	                      	<div class="toast bg-danger fade show" role="alert" aria-live="assertive" aria-atomic="true">	<div class="toast-header"><strong class="mr-auto">Error</strong><small></small>	</div>
	                      		<div class="toast-body">{{$error}}</div>
	                      	</div>
                      	<!--errors -->

                      	@endforeach
                      	<h3>Request Details</h3>
                        <span class="username">
                          <a href="#">Request Made on 
	                        <?php
	                            $date = date_create($requestDetails->created_at);
	                            echo date_format($date, "d/m/Y");
	                         ?>.</a>
                        </span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                     	<div class="callout callout-info">
				              <p>{{$requestDetails->description}}</p>
            				</div>
                    <div class="text-right">
                      @switch($requestDetails->status)
                        @case(0)
                          <button class="btn btn-primary"> New Request</button>
                          @break
                        @case(1)
                          <button class="btn btn-primary">Approved(Pending MoWT)</button>
                          @break
                        @case(2)
                          <button class="btn btn-danger">Rejected</button>
                          @break
                        @case(3)
                          <button class="btn btn-info">Kept InView</button>
                          @break
                        @case(4)
                          <button class="btn btn-danger"> Pending MoWT Request Verification</button>
                          @break
                        @case(5)
                          <button class="btn btn-danger">Procurement Underway</button>
                          @break

                      @endswitch
                    </div>
						<br>	
             <!-- upload documents -->
             <!-- check if request is rejected or not -->
            @if($requestDetails->status != 2)
							<div class="callout callout-warning">
				              <h5></i> File List:</h5>
				              @if($requestDetails->documents -> isEmpty())
				              	<p class="text-danger">No Documents</p>
				              @else
								@foreach($requestDetails->documents as $document)
									<li>{{$document->file_name}}</li>	
								@endforeach
							  @endif
            				</div>		
					</p>
              <form action="{{$requestDetails->id}}/documents" method="POST" enctype="multipart/form-data">
              @csrf
                          <div class="form-group">
                            <select class="form-control" name="file_name">  
                              <option></option>
                              <option value="LPO Document">LPO</option>
                              <option value="Mowt Approval Document">Mowt Approval</option>
                            </select>
                            <br>
                            <h4>Add File</h4>
                            <input type="file" name="file">
                          </div>
                          <div class="form-group">
                            <button class="btn btn-primary" name="submit" type="submit">Add File</button> 
                          </div>
            </form>
            @endif
            <!-- upload documents -->
                    </div>
                    <!-- /.post -->
                    
                  </div>
                  <!-- /.tab-pane -->
          
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
			</div>
			<!-- request details -->
		</div>
	<!-- container -->
	</div>
	<!-- /cotent -->

@endsection
