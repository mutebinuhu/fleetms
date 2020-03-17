@extends('layouts.dashboard')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
            @if(session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{session('status')}}</strong> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
			<div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Vehicle</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                  <form action="{{route('vehicles.update', $editvehicle->id)}}" method="POST" autocomplete="off">
                    {{method_field('PATCH')}}
                    @csrf
                       <div class="form-group row">
                           <label for="reg_no" class="col-sm-2 col-form-label">Reg No:</label>
                            <div class="col-sm-10">
                                <input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" placeholder="reg no" value="{{$editvehicle->reg_no}}">
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
                            value="{{$editvehicle->eng_no}}">
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
                            <input type="text" name="make" class="form-control @error('make') is-invalid @enderror" placeholder="make" value="{{$editvehicle->make}}">
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
                            <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" placeholder="type" value="{{$editvehicle->make}}">
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
                            <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" placeholder="mileage" value="{{$editvehicle->mileage}}">
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
                            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" placeholder="year" value="{{$editvehicle->year}}">
                             @error('year')
                            <span class="invalid-feedback" role="alert">
                        		<strong>{{ $message }}</strong>
                        	</span>
                        	@enderror  
                        </div>
                     </div>
                     <div class="modal-footer">
                    <a href="{{('/vehicles')}}"  class="btn btn-secondary">Cancel</a>
                    <button name="submit" class="btn btn-primary" type="submit">submit</button>
                    <form method="POST" action="{{route('vehicles.destroy', $editvehicle->id)}}" class="my-5">
                  @csrf
                  {{method_field('DELETE')}}
                  <button type="submit" name="submit" class="btn btn-danger">Delete</button>
               </form>
                </div>
                   </form>
            </div>
            <!-- /.card-body -->
          </div>
		</div>
	</div>
</div>
@endsection