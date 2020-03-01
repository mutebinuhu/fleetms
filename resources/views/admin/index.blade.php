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

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add Vehicle
    </button>   
    @endsection
    <!-- Button trigger modal-->
    <div class="modal fade lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLongTitle">Add Vehicle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <divO class="modal-body">
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

    @endsection
</div>