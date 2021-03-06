@extends('layouts.dashboard')
@section('content')
	<div class="content">
		<div class="row justify-content-center ">
        <div class="col-md-12 ">
          <!-- card -->
          <div class="card card-primary ">
            <div class="card-header">
              <h3 class="card-title">Add user</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body" style="display: block;">
            	 <form method="POST" action="{{ url('/users') }}" autocomplete="off" >
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="first name">First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first-name" placeholder="first name" autofocus value="{{old('first_name')}}">
                         @error('first_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-6">
                        <label for="sur name">SurName</label>
                         <input type="text" name="sur_name" class="form-control @error('sur_name') is-invalid @enderror" id="sur-name" placeholder="sur name" value="{{old('sur_name')}}">
                        @error('sur_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{old('email')}}" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-6">
                         <label for="password">Role</label>
                            <select id="role" class="form-control  @error('role') is-invalid @enderror" name="role">
                                <option></option>
                                <option>Transport Officer</option>
                                <option>Admin</option>
                                <option>Driver</option>

                            </select>
                     </div>
                     <div class="form-group col-md-6">
                         <label for="password-confirm">Department</label>
                              <select id="department" class="form-control  @error('department') is-invalid @enderror" name="department">
                                <option></option>
                                <option>Finance</option>
                                <option>Procurement</option>
                                <option>Adminstration</option>

                            </select>
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message }}</strong>
                        </span>
                        @enderror
                     </div>
                      <div class="form-group col-md-6">
                        <label for="phone_number">Phone</label>
                        <input type="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="phone" value="{{old('phone_number')}}" >
                        @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
               </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
		</div>
	</div>
@endsection
