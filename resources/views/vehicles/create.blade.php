@extends('layouts.dashboard')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Vehicle</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                  <form action="{{url('/vehicles')}}" method="POST" autocomplete="off">
                    @csrf
                       <div class="form-group row">
                           <label for="reg_no" class="col-sm-2 col-form-label">Reg No:</label>
                            <div class="col-sm-10">
                                <input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" placeholder="reg no" value="{{old('reg_no')}}">
                                 @error('reg_no')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror
                            </div>
                     </div>
                     <div class="form-group row">
                         <label for="eng_no" class="col-sm-2 col-form-label">Engine No:</label>
                        <div class="col-sm-10">
                            <input type="text" name="eng_no" class="form-control @error('eng_no') is-invalid @enderror" placeholder="eng no"
                            value="{{old('eng_no')}}">
                             @error('eng_no')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="make" class="col-sm-2 col-form-label">Make</label> 
                        <div class="col-sm-10">
                            <input type="text" name="make" class="form-control @error('make') is-invalid @enderror" placeholder="make" value="{{old('make')}}">
                             @error('make')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror
                        </div>
                     </div>
                       <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label> 
                        <div class="col-sm-10">
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="type" value="{{old('type')}}">
                             @error('type')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror    
                        </div>
                     </div>
                       <div class="form-group row">
                        <label for="mileage" class="col-sm-2 col-form-label">Mileage</label> 
                        <div class="col-sm-10">
                            <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" placeholder="mileage" value="{{old('mileage')}}">
                             @error('mileage')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror
                            
                        </div>
                     </div>
                       <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Year</label> 
                        <div class="col-sm-10">
                            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" placeholder="year" value="{{old('year')}}">
                             @error('year')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror  
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Vehicle Status</label> 
                        <div class="col-sm-10">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" placeholder="year" value="{{old('status')}}">
                                <option></option>
                                <option>Under Repair</option>
                                <option>Operational</option>
                                <option>Out Of Service</option>
                                <option>Damaged</option>


                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                     <div class="modal-footer">
                    <a href="{{url('/vehicles')}}"  class="btn btn-secondary">Cancel</a>
                    <button name="submit" class="btn btn-primary" type="submit">submit</button>
                </div>
                   </form>
            </div>
            <!-- /.card-body -->
          </div>
		</div>
	</div>
</div>
@endsection