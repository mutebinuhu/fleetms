@extends('layouts.application')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="row content">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countusers}}</h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>   
              </div>
              <a href="{{url('/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
          <!-- ./col -->
          <!-- ./col -->
          <!-- ./col -->
        </div>
	<div class="row content">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>
                @if(session('status'))
                	<div class="alert alert-warning alert-dismissible fade show" role="alert">
  						     <strong>{{session('status')}}</strong> 
  						    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					         <span aria-hidden="true">&times;</span>
  					     </button>
                 </div>
                @endif
				
           
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>First name</th>
                      <th>Sur name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Department</th>
                      <th class="text-right"><a href="{{url('users/create')}}" class="btn btn-success btn-lg">Add User</button></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@if($users->isEmpty())
                  		<p>No Users Yet</p>
                  	@endif
                  	@foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->first_name}}</td>
                      <td>{{$user->sur_name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role}}</td>
                      <td>{{$user->department}}</td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{action('userscontroller@show', $user->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{action('userscontroller@edit', $user->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <div class="text-center">{{$users->links()}}</div>

        	<a href="{{url('/admin')}}" class="btn btn-primary">Back</a>
          </div>
        </div>
@endsection