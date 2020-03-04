@extends('layouts.application')
@section('content')
	<div class="content">
		<div class="row justify-content-center ">
        <div class="col-md-12 ">
          @if(session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{session('status')}}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
              @endif
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
                        <label for="sur name">Sur Name</label>
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
                     <div class="form-group col-md-3">
                         <label for="password">Role</label>
                            <select id="role" class="form-control  @error('role') is-invalid @enderror" name="role">
                                <option></option>
                                <option>to</option>
                                <option>admin</option>
                                <option>driver</option>

                            </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-3">
                         <label for="password-confirm">Department</label>
                              <select id="department" class="form-control  @error('department') is-invalid @enderror" name="department">
                                <option></option>
                                <option>finance</option>
                                <option>procurement</option>
                                <option>adminstration</option>

                            </select>
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{$message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
                  <a  href="{{url('/users')}}" class="btn btn-default">Back</a>

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
