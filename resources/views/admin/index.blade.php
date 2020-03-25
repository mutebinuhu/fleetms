
@extends('layouts.dashboard')
    @section('content')
    <!-- col -->
    <div class="col-md-12">
      <div class="row">
          <div class="col-lg-4 col-md-12">
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
          <div class="col-lg-4 col-md-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countvehicles}}<sup style="font-size: 20px"></sup></h3>

                <p>Vehicles</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="{{url('/vehicles')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-md-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$countusers}}</h3>

                <p>Requests</p>
              </div>
              <div class="icon">
                  <i class="fab fa-joget"></i>
              </div>
              <a href="{{url('#')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
          <!-- ./col -->

           
<div class="content">      
  <!-- lists -->
  <!-- ul -->
  <!-- card -->
<div class="card">
  <!-- card-header -->
  <div class="card-header">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Recent vehicles</a>
        </li>
        <li class="nav-item">
           <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Recent Users</a>
        </li>
        <!-- last tab
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Recent Requests</a>
        </li>
      -->
  </ul>
<!-- /ul -->
  </div>
<!-- /card-header -->
<!-- tabs -->
<div class="tab-content" id="pills-tabContent">
  <!-- vehicle list tab -->
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <!-- card -->
    <div class="card">
          <div class="col-lg-12">
            <div class="card col-lg-12 ">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table display cell-border" id="vehicles_datatable" width="100%">
                   <thead>
                    <tr>
                      <th>ID</th>
                      <th>Car Make</th>
                      <th>Type</th>
                      <th>Reg No</th>
                      <th style="text-align: center;">Created</th>
                    </tr>
                  </thead>
                  <tbody>
                                      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

    </div>
    <!-- /card -->
  </div> 
  <!-- /vehicle list tab -->
  <!-- users list tab -->
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!-- users list card -->
    <div class="card col-lg-12">
      <!-- card body -->
        <div class="card-body col-lg-12">
              <!-- /.card-header -->
                 <!--datatables-->
                <table class="table display cell-border" id="users_datatable" width="100%">
                   <thead class="bg-primary">
                      <tr>
                         <th>Id</th>
                         <th>Name</th>
                         <th>Email</th>
                         <th>Created at</th>
                      </tr>
                  </thead>
                  <tbody>
                                       
                  </tbody>
                </table>
                 <!--/datatables-->
      <!-- /card body -->
           </div>
    <!-- /users list card -->
     </div>

  <!-- /users list tab -->
  <!------------ last tab
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
 /last tab -------------->
</div>
<!-- tabs -->
<!-- lists -->
</div>
<!-- card -->
</div>
<!-- content -->
@section('scripts')
 <script type="text/javascript">
     $(document).ready(function(){
      $('#users_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('users-list') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'sur_name', name: 'sur_name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' }
                 ]
        }); 
      $('#vehicles_datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('vehicles-list') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'reg_no', name: 'reg_no' },
                    { data: 'type', name: 'type' },
                    { data: 'make', name: 'make' },
                    { data: 'created_at', name: 'created_at' },

                 ]
        }); 
    });
 </script>
@endsection
@endsection