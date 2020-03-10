@extends('layouts.drivers.index')
@section('content')
<!-- content -->
<div class="content section">
	<!-- row -->
	 <div class="row">
	 	<div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>5</h3>

                <p>Requests</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('#')}}" class="small-box-footer">Request </a>
            </div>
          </div>
          <!-- col -->
          <div class="col-lg-12 col-12">
            <!-- header box -->
            <!-- card -->
          <div class="card card-primary ">
            <div class="card-header">
              <h3 class="card-title">Request</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
            	<!-- loop -->
            	@foreach($getdata as $data)
            		 <form method="POST" action="{{ url('/requests') }}" autocomplete="off" >
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="first name"><strong>Regno:{{$data->reg_no}}</strong></label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first-name" placeholder="first name" autofocus value="{{$data->reg_no}}">
                         @error('first_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                        
                  </div>
                  <div class="form-row">
                  	<div class="form-group col-md-6">
                        <div class="form-group">
    						<label for="exampleFormControlTextarea1">Description
    						</label>
    						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  						</div>
                  	</div>
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
               </form>
               <div class="my-5"></div>
            	@endforeach
            	<!-- /loop -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
          <!-- end of col -->
          <!-- col -->
    <!-- /col -->
	 </div>
	<!-- /row -->

</div>
<!-- content -->
@endsection