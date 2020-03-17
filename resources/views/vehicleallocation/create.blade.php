@extends('layouts.dashboard')
@section('content')
<!-- content -->
<div class="content">
	<!-- card -->
			<div class="card">				
				<div class="card-header">Allocate Vehicle</div>
					<div class="card-body">	
						<form action="{{url('/vehicleallocation')}}" method="POST">
							@csrf
  							<div class="form-row">
    							<div class="col-4">
    								<label>Reg No</label>
      								<select class="select2 custom-select custom-select-lg mb-3 @error('reg_no') is-invalid @enderror" name="reg_no">
    									<option></option>
      									@foreach($vehicles as $vehicle)
  										<option value="{{$vehicle->id}}">{{$vehicle->reg_no}}</option>
  										@endforeach
									</select>
									@error('reg_no')
                        			<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        			</span>
                        			@enderror

    							</div>
    							<div class="col-4">
    								<label>Officer</label>
      								<select class="select2 custom-select custom-select-lg mb-3 @error('officer') is-invalid @enderror" name="officer">
    									<option></option>
  										@foreach($officers as $officer)
  										<option value="{{$officer->id}}">{{$officer->sur_name . " " . $officer->first_name . " " . $officer->phone_number}}</option>
  										@endforeach
									</select>
									@error('officer')
                        			<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        			</span>
                        			@enderror
    							</div>
    							<div class="col-4">
    								<label>Driver</label>
      								<select class=" form-control select2 custom-select custom-select-lg mb-3 @error('driver') is-invalid @enderror" name="driver">
    									<option></option>     					
      									@foreach($drivers as $driver)
  										<option value="{{$driver->id}}">{{$driver->sur_name . " " . $driver->first_name . " " . $driver->phone_number}}</option>
  										@endforeach
									</select>
									@error('driver')
                        			<span class="invalid-feedback" role="alert">
                        			<strong>{{ $message }}</strong>
                        			</span>
                        			@enderror
    							</div>
  							</div>
  								<div class="text-center my-5">
  									<button class="btn btn-primary btn-lg btn-block">Allocate</button>
  								</div>
							</form>

					</div>
				</div>
				<!-- end card -->
</div>
<!-- end content -->
@endsection