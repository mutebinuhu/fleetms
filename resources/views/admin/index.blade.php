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
    <div class="col-md-12">
      <div class="row">
          <div class="col-lg-4 col-8">
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
          <div class="col-lg-4 col-8">
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
          <div class="col-lg-4 col-8">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$countusers}}</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('/users')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
        </div>
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Recent users</a></li>
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Recent Vehicles</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Recent Requests</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <!-- Post -->
                    <div class="tab-pane active" id="activity">
                    <!-- Post -->
                      @foreach($users as $user)
                        <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="https://image.shutterstock.com/image-vector/avatar-vector-male-profile-gray-260nw-538707355.jpg" alt="user image">
                        <span class="username">
                          <a href="{{action('userscontroller@show', $user->id)}}">{{$user->first_name . " " . $user->sur_name}}</a>
                          
                        </span>
                        <span class="description">created on {{$user->created_at}}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Role : <strong>{{ " ".  $user->role}}</strong>
                      </p>
                    </div>
                      @endforeach
                  
                  </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane active" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recent Vehicles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0 ">
                <table class="table table-sm">
                  <thead class="bg-primary">
                    <tr>
                      <th style="width: 80px">#</th>
                      <th>Car Make</th>
                      <th>Type</th>
                      <th>Reg No</th>
                      <th style="text-align: center;">Created</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                      <td>{{$vehicle->id}}</td>
                      <td>{{$vehicle->make}}</td>
                      <td>{{$vehicle->type}}</td>
                      <td>{{$vehicle->reg_no}}</td>
                      <td style="text-align: center;">{{$vehicle->created_at}}</td>

                    </tr>
                    <tr>
                    @endforeach 
                    
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                    
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <script type="text/javascript">
            
          
          </script>
    @endsection