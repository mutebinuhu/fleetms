@extends('layouts.dashboard')
@section('content')
<!-- content -->
<div class="content section">
	<!-- row -->
	 <div class="row">
	 	<div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>SEND REQUEST</h3>
                <p>{{$countRequests}}</p>
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
            		 <form method="POST" action="{{ url('/requests') }}" autocomplete="off" >
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-6">
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
                  	<div class="form-group col-md-6">
                        <div class="form-group">
    						      <label for="description">Description
    						      </label>
    						      <textarea class="form-control @error('description') is-invalid @enderror" name="description"rows="3"></textarea>
  						      </div>
                  	</div>
                     @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
               </form>
               <div class="my-5"></div>
            
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