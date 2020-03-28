@extends('layouts.dashboard')
@section('content')
<div class="row content">
    <div class="col-lg-12">
      <!-- small boxes -->
      <div class="row">
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>5</h4>

                <p>UnAssigned</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>54</h4>

                <p>Assigned</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>44</h4>

                <p>Under Repair</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>65</h4>
                <p>Out Of Service</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
               <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>6</h4>
                <p>Operational</p>      
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
               <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h4>{{$countvehicles}}</h4>
                <p>Total Vehicles</p>

              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <!-- /end small boxes  -->
    </div>
    <!-- table -->
    <div class="col-12">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vehicles List</h3>

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
                      <th>Status</th>
                      <th class="text-right">
                        <a href="{{url('vehicles/create')}}" class="btn btn-success btn-lg">AddVehicle</a>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($vehicles->isEmpty())
                    <p>No Vehicles</p>
                    @else
                    @foreach($vehicles as $vehicle)
                    <tr>
                      <td><?php echo strtoupper($vehicle->reg_no) ;?></td>
                      <td>{{$vehicle->type}}</td>
                      <td>{{$vehicle->eng_no}}</td>
                      <td>{{$vehicle->status}}</td>
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
                    @endif
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
                {{$vehicles->links()}}

            <!-- /.card -->
          </div>
        </div>
    </div>
    <!-- table -->

</div>
@endsection
