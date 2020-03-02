@extends('layouts.application')
<div class="container">
    @section('content')
     @section('info') 
    @if (session('status'))
                <p  class="alert alert-success">{{session('status')}}</p>
        @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">User List <span class="text-right"><sup>{{$countusers}}</sup></span></div>
                <div class="card-body">
                    @if($users->isEmpty())
                        <p>No Users</p>
                    @endif
                    @foreach($users as $user)
                        <li><a href="{{action('AdminController@singleUser', $user->id)}}">{{$user->sur_name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Vehicle List <span><sup>{{$countvehicles}}</sup></span></div>
                <div class="card-body">
                @if($vehicles->isEmpty())
                    <p>No Vehicles Yet</p>
                @endif
                @foreach($vehicles as $vehicle)
                   <li> <a href="{{action('AdminController@singleVehicle', $vehicle->url)}}">{{$vehicle->reg_no}}</a></li>

                @endforeach
                </div>
            </div>
        </div>
    </div>
    @section('sidebar')

    <!-- checks for errors -->
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
    <!-- end of check for errors -->
    <!-- success status -->
    @if(session('status'))
        <p>{{session('status')}}</p>
    @endif
    <!-- end success status -->

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-vehicle">Add Vehicle
    </button> 
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-user">Add User
    </button>  
    @endsection
    <!-- Button trigger modal-->
    <!-- add vehicle modal -->
    <div class="modal fade lg" id="add-vehicle" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="">Add Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                   <form action="{{url('/admin/storevehicle')}}" method="POST">
                    @csrf
                       <div class="form-group row">
                           <label for="reg_no" class="col-sm-2 col-form-label">Reg No:</label>
                            <div class="col-sm-10">
                                <input type="text" name="reg_no" class="form-control" placeholder="reg no">
                            </div>
                     </div>
                     <div class="form-group row">
                         <label for="eng_no" class="col-sm-2 col-form-label">Engine No:</label>
                        <div class="col-sm-10">
                            <input type="text" name="eng_no" class="form-control" placeholder="eng no">
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="make" class="col-sm-2 col-form-label">Make</label> 
                        <div class="col-sm-10">
                            <input type="text" name="make" class="form-control" placeholder="make">
                            
                        </div>
                     </div>
                       <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">Type</label> 
                        <div class="col-sm-10">
                            <input type="text" name="type" class="form-control" placeholder="type">    
                        </div>
                     </div>
                       <div class="form-group row">
                        <label for="mileage" class="col-sm-2 col-form-label">Mileage</label> 
                        <div class="col-sm-10">
                            <input type="text" name="mileage" class="form-control" placeholder="mileage">
                            
                        </div>
                     </div>
                       <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Year</label> 
                        <div class="col-sm-10">
                            <input type="text" name="year" class="form-control" placeholder="year">
                            
                        </div>
                     </div>
                     <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                   </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end add vehicle modal -->
    <!-- add user modal -->
        <div class="modal fade lg" id="add-user" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="">Add user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body">
                    <form method="POST" action="{{ url('/admin/adduser') }}" autocomplete="off" >
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
                            <select id="role" class="form-control" name="role">
                                <option></option>
                                <option>otp</option>
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
                              <select id="department" class="form-control" name="department">
                                <option></option>
                                <option>finance</option>
                                <option>procurement</option>
                                <option>adminstration</option>

                            </select>
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
               </form>
                </div>
                
            </div>
        </div>
    </div>

    @endsection
</div>