@extends('layouts.application')
@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://image.shutterstock.com/image-vector/avatar-vector-male-profile-gray-260nw-538707355.jpg">
                </div>
                  <form method="POST" action="{{ route('users.update', $edituser->id) }}" autocomplete="off" >
                  {{ method_field('PATCH')}}
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="first name">First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first-name" placeholder="first name" autofocus value="{{$edituser->first_name}}">
                         @error('first_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-6">
                        <label for="sur name">Sur Name</label>
                         <input type="text" name="sur_name" class="form-control @error('sur_name') is-invalid @enderror" id="sur-name" placeholder="sur name" value="{{$edituser->sur_name}}">
                        @error('sur_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{$edituser->email}}" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-4">
                         <label for="role">Role</label>
                            <select id="role" class="form-control  @error('role') is-invalid @enderror" name="role">
                                <option>{{$edituser->role}}</option>
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
                     <div class="form-group col-md-4">
                         <label for="password-confirm">Department</label>
                              <select id="department" class="form-control  @error('department') is-invalid @enderror" name="department">
                                <option>{{$edituser->department}}</option>
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
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                  <a  href={{url('/users')}} class="btn btn-default">Back</a>

               </form>
               <form method="POST" action="{{route('users.destroy', $edituser->id)}}" class="my-5">
                  @csrf
                  {{method_field('DELETE')}}
                  <button type="submit" name="submit" class="btn btn-danger">Delete</button>
               </form>
              </div>
              <!-- /.card-body -->
            </div>
			</div>
		</div>
	</div>
@endsection