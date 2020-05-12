@extends('layouts.dashboard')
@section('content')
	<!-- container -->
<div class="container">
		<div class="col-md-12">
            <div class="card card-primary">
            	<div class="card-header">Status List</div>
              <!-- card-body -->
              <div class="card-body" style="display: block;">
             	<div class="row">
		          <div class="col-md-3 col-sm-6 col-12">
		            <div class="info-box">
		              <span class="info-box-icon bg-info"><a href="#"><i class="far fa-envelope"></i></a></span>
		              <div class="info-box-content">
		                <span class="info-box-text">Status</span>
		                <span class="info-box-number">1,410</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-3 col-sm-6 col-12">
		            <div class="info-box">
		              <span class="info-box-icon bg-success"><a href="#"><i class="far fa-flag"></i></a></span>
		              <div class="info-box-content">
		                <span class="info-box-text">Repairs</span>
		                <span class="info-box-number">410</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-3 col-sm-6 col-12">
		            <div class="info-box">
		              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
		              <div class="info-box-content">
		                <span class="info-box-text">users</span>
		                <span class="info-box-number">13,648</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		          <div class="col-md-3 col-sm-6 col-12">
		            <div class="info-box">
		              <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">vehicles</span>
		                <span class="info-box-number">93,139</span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>
		            <!-- /.info-box -->
		          </div>
		          <!-- /.col -->
		        </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</div>
<!-- /container -->
@endsection