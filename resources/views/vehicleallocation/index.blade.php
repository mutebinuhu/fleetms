@extends('layouts.admin.index')
@section('content')
		<!-- content  -->
	    <div class="row content">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Allocations</h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-location-arrow"></i>    
              </div>
              <a href="{{url('/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
		<!-- content  -->
		<div class="content">
              <!-- table -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

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
      				@if($vehicles->isEmpty())
      					<p>No Vehicles</p>
      				@endif
                    <tr>
                      <th>ID</th>
                      <th>Reg No</th>
                      <th>type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                      <td>{{$vehicle->id}}</td>
                      <td>{{$vehicle->reg_no}}</td>
                      <td>{{$vehicle->type}}</td>
                      @if(1 != 2)
                      	<td><button class="btn btn-primary" type="submit" name="submit">Allocate</button></td>
                      @endif
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