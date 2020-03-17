@extends('layouts.dashboard')
@section('content')
		<!-- content  -->
	    <div class="row content">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Allocations</h3>
                <p>{{$countallocatedvehicles}}</p>
              </div>
              <div class="icon">
                <i class="fas fa-location-arrow"></i>    
              </div>
              <a href="{{url('vehicleallocation/create')}}" class="small-box-footer">Allocate <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
		<!-- content  -->
		<div class="content">
		<!-- card -->
			
		
             <!-- table -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Allocated Vehicles</h3>

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
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
      				@if($allocatedvehicles->isEmpty())
      					<p>No Vehicles</p>
      				@endif
                    <tr>
                      <th>Reg No</th>
                      <th>Officer</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allocatedvehicles as $vehicle)
                    <tr>
                      <td>{{$vehicle->reg_no}}</td>
                      <td>{{$vehicle->sur_name . " ". $vehicle->first_name}}</td>
                    <tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

		</div>
		<!-- end content -->

@endsection