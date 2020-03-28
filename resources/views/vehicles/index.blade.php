@extends('layouts.dashboard')
@section('content')
    <div class="row content">
          <!-- .col -->
          <div class="col-lg-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countvehicles}}</h3>
                <p>vehicles</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
   <div class="row content">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vehicles list</h3>
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
                      <th>Reg No</th>
                      <th>Type</th>
                      <th>Eng No</th>
                      <th class="text-right"><a href="{{url('vehicles/create')}}" class="btn btn-success btn-lg">Add Vehicle</a></button></th>
                    </tr>
                  </thead>
                  <tbody>
                  	@if($vehicles->isEmpty())
                  	<p>No Vehicles Yet</p>
                  	@endif
                  	@foreach($vehicles as $vehicle)
                    <tr>
                      <td>{{$vehicle->reg_no}}</td>
                      <td>{{$vehicle->type}}</td>
                      <td>{{$vehicle->eng_no}}</td>
                       <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{action('vehiclescontroller@show', $vehicle->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{action('vehiclescontroller@edit', $vehicle->id)}}">
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
          </div>
        </div>

@endsection