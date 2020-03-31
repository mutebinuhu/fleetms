@extends('layouts.dashboard')
@section('content')
<div class="row content">
    <div class="col-lg-12 animated fadeIn">
      <!-- small boxes -->
      <div class="row">
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>{{$countunassignedvehicles}}</h4>

                <p>UnAssigned</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4>{{$countassignedvehicles}}</h4>

                <p>Assigned</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>{{$countunderrepairvehicles}}</h4>

                <p>Under Repair</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>{{$countoutofservicevehicles}}</h4>
                <p>Out Of Service</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
          <!-- ./col -->
               <!-- ./col -->
          <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h4>{{$countoperationalvehicles}}</h4>
                <p>Operational</p>      
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
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
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <!-- /end small boxes  -->
    </div>
   
<div class="col-12"> 
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="pills-vehicles-tab" data-toggle="pill" href="#pills-vehicles" role="tab" aria-controls="pills-vehicles" aria-selected="true">All Vehicles</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-repair-tab" data-toggle="pill" href="#pills-repair" role="tab" aria-controls="pills-repair" aria-selected="false">Under Repair</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-damaged-tab" data-toggle="pill" href="#pills-damaged" role="tab" aria-controls="pills-damaged" aria-selected="false">Damaged</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-outofservice-tab" data-toggle="pill" href="#pills-outofservice" role="tab" aria-controls="pills-outofservice" aria-selected="false">Out Of Service</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="pills-operational-tab" data-toggle="pill" href="#pills-operational" role="tab" aria-controls="pills-operational" aria-selected="false">Operational
      </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-assigned-tab" data-toggle="pill" href="#pills-assigned" role="tab" aria-controls="pills-assigned" aria-selected="false">Assigned
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link" id="pills-unassigned-tab" data-toggle="pill" href="#pills-unassigned" role="tab" aria-controls="pills-unassigned" aria-selected="false">Un Assigned
      </a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-vehicles" role="tabpanel" aria-labelledby="pills-vehicles-tab">
       <!-- all vehicles table -->
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
    <!-- /all vehicles table -->

  </div>
  <div class="tab-pane fade" id="pills-repair" role="tabpanel" aria-labelledby="pills-repair-tab">
      <!--under repair all vehicles table -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vehicles Under Repair</h3>
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
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($vehicles as $underrepair)
                  @if($underrepair->status == 'Under Repair')
                    <tr>
                      <td>{{$underrepair->reg_no}}</td>
                      <td>{{$underrepair->type}}</td>
                      <td>{{$underrepair->eng_no}}</td>
                      <td>{{$underrepair->status}}</td>  
                      <td><?php echo count($underrepair)?></td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
             {{$vehicles->links()}}
            <!-- /.card -->
    <!-- /under repair vehicles table -->
  </div>
  <div class="tab-pane fade" id="pills-damaged" role="tabpanel" aria-labelledby="pills-damaged-tab">
     <!-- damaged vehicles table -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Damaged Vehicles</h3>
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
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($vehicles as $underrepair)
                  @if($underrepair->status == 'Damaged')
                    <tr>
                      <td>{{$underrepair->reg_no}}</td>
                      <td>{{$underrepair->type}}</td>
                      <td>{{$underrepair->eng_no}}</td>
                      <td>{{$underrepair->status}}</td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
             {{$vehicles->links()}}
            <!-- /.card -->
    <!-- /damaged vehicles table -->
  </div>
    <div class="tab-pane fade" id="pills-outofservice" role="tabpanel" aria-labelledby="pills-outofservice-tab">
       <!--out of service vehicles table -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Out Of Service Vehicles</h3>
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
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($vehicles as $underrepair)
                  @if($underrepair->status == 'Out Of Service')
                    <tr>
                      <td>{{$underrepair->reg_no}}</td>
                      <td>{{$underrepair->type}}</td>
                      <td>{{$underrepair->eng_no}}</td>
                      <td>{{$underrepair->status}}</td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
             {{$vehicles->links()}}
            <!-- /.card -->
    <!-- /out of service vehicles table -->
  </div>
    <div class="tab-pane fade" id="pills-operational" role="tabpanel" aria-labelledby="pills-operational-tab">
    <!-- operational vehicles table -->
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Operational Vehicles</h3>
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
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($vehicles as $underrepair)
                  @if($underrepair->status == 'Operational')
                    <tr>
                      <td>{{$underrepair->reg_no}}</td>
                      <td>{{$underrepair->type}}</td>
                      <td>{{$underrepair->eng_no}}</td>
                      <td>{{$underrepair->status}}</td>
                    </tr>
                    @endif
                    @endforeach
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
             {{$vehicles->links()}}
            <!-- /.card -->
    <!--/operational vehicles table -->
  </div>
  <div class="tab-pane fade" id="pills-assigned" role="tabpanel" aria-labelledby="pills-assigned-tab">
    @if($assignedvehicles->isEmpty())
      <p>empty</p>
    @else
    <!-- assigned vehicles -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Assigned Vehicles</h3>
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
                      <th>Driver</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($assignedvehicles as $assignedvehicle)
                    <tr>
                      <td>{{$assignedvehicle->reg_no}}</td>
                      <td>{{$assignedvehicle->type}}</td>
                      <td>{{$assignedvehicle->eng_no}}</td>
                      <td>{{$assignedvehicle->status}}</td>
                      <td>{{$assignedvehicle->sur_name . " ".$assignedvehicle->first_name }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
             {{$vehicles->links()}}
            <!-- /.card -->
    <!-- end assigned vehicles -->
    @endif
  </div>
    <div class="tab-pane fade" id="pills-unassigned" role="tabpanel" aria-labelledby="pills-unassigned-tab">
      @if($unassignedvehicles->isEmpty())
        <p>No Unsigned Vehicles</p>
        @else
            <!-- unassigned vehicles -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">UnAssigned Vehicles</h3>
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
                      <th>Created</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($unassignedvehicles as $unassignedvehicle)
                    <tr>
                      <td>{{$unassignedvehicle->reg_no}}</td>
                      <td>{{$unassignedvehicle->type}}</td>
                      <td>{{$unassignedvehicle->eng_no}}</td>
                      <td>{{$unassignedvehicle->status}}</td>
                      <td>
                        <?php 
                          $date = date_create($unassignedvehicle->created_at);
                          echo date_format($date, "d/m/Y")
                         ?>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    <!-- end unassigned vehicles -->
      @endif
        
  </div>
</div>  
</div>
</div>
@endsection
