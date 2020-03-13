@extends('layouts.requests.index')
    @section('content')
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Driver Dashboard</h1>
            
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
          <!-- errors -->
          @foreach($errors->all() as $error)
          <p class="alert alert-danger alert-dismissible fade show col-12" role="alert">
            <strong>{{$error}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </p>
          @endforeach
          <!-- /errors -->
         <!-- alert -->
          @if(session('status'))
            <div class="alert alert-warning alert-dismissible fade show col-12" role="alert">
              <strong>{{session('status')}}</strong> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <!-- /alert -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- tiles -->
    <div class="col-md-12">
      <div class="row">
          <div class="col-lg-4  col-md-4 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$countRequests}}</h3>

                <p>Requests</p>
              </div>
              <div class="icon">
                  <i class="fab fa-joget"></i>
              </div>
              <a href="{{url('#')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$countPending}}<sup style="font-size: 20px"></sup></h3>

                <p>Pending</p>
              </div>
              <div class="icon">
                <i class="fas fa-pause"></i>
              </div>
              <a href="{{url('#')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$countApproved}}</h3>
                <p>Approved</p>
              </div>
              <div class="icon">
                <i class="far fa-thumbs-up"></i>
              </div>
              <a href="{{url('#')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
          <!-- end tiles -->
        <!-- row -->
       <div class="row">
        <!-- profile -->
         <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://yinnepal.files.wordpress.com/2017/11/admin.png?w=640" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->first_name . " " . Auth::user()->sur_name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->role}}</p>
                <!-- send request -->
                @if($getdata->isEmpty())
                 @else
                  <a href="" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createModal">
                    <b>Request</b>
                  </a>      
                @endif
                <!-- /send request -->
                <!-- ul for details -->
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Department</b> <a class="float-right">{{Auth::user()->department}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone</b> <a class="float-right">{{Auth::user()->phone_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Reg No</b> 
                    <a class="float-right">
                       @if($getdata->isEmpty())
                          no vehicle allocated yet
                       @endif
                       @foreach($getdata as $data)
                          <p>{{$data->reg_no}}</p>
                        @endforeach
                    </a>
                  </li>
                </ul>
                <!-- /ul for details -->
              </div>
              <!-- /.card-body -->
            </div>
         </div>
         <!-- /profile -->
         <!-- history -->
          <div class="col-sm-12 col-md-4 col-lg-8">
            <!-- card -->
            <div class="card card-primary card-outline">
              <div class="card-header">Requests History</div>
              <div class="card-body">
                      <!-- time line -->
               @foreach($requestHistory as $request)
                 <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          {{$request->created_at}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fa fa-car bg-primary" aria-hidden="true"></i>
                        <div class="timeline-item">
                          <span class="time"></i>
                            @if($request->status == 'pending')
                            <i class="text-warning">pending</i>
                            @elseif($request->status == 'approved')
                            <i class="text-success bg-success text-success-lg">approved</i>
                            @endif
                          </span>

                          <h3 class="timeline-header"><a href="#">Reg No:</a>{{$request->reg_no}}</h3>

                          <div class="timeline-body">
                            {{$request->description}}
                          </div>
                          <div class="timeline-footer">
                            @if($request->status == 'approved')
                             <a href="#" class="btn btn-primary btn-sm">Download</a>
                            @endif
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          @if($request->status == 'pending')
                            <h3 class="timeline-header"><a href="#">{{Auth::user()->sur_name}}</a> your request is still pending</h3> 
                          @elseif($request->status == 'approved') 
                            <h3 class="timeline-header"><a href="#">{{Auth::user()->sur_name}}</a> your request is approved</h3> 
                          @endif
                        </div>
                      </div>
               @endforeach
                      <!-- END timeline item -->
              </div>
              </div>
            </div>
            <!-- /card -->
          </div>
         <!-- /history -->
       </div> 
        <!-- end row -->
        <!-- create request Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <!-- request form -->
                  <div class="container">
                    <div class="row">
                      <div class=" col-sm-12  col-12  col-md-12 col-lg-12">
                        <!-- form -->
                          <form method="POST" action="{{ route('requests.store') }}" autocomplete="off" >
                            @csrf
                              <div class="form-row">
                                 <div class="form-group col-md-12">
                                    <label>Reg No:</label>
                                    <select class="select2 custom-select custom-select-lg mb-3 @error('reg_no') is-invalid @enderror" name="vehicle_id">
                                    <option></option>
                                    @foreach($getdata as $regno)
                                    <option value="{{$regno->vehicle_id}}">{{$regno->reg_no}}</option>
                                    @endforeach
                                    </select>
                                    @error('reg_no')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                 </div>
                               </div>
                               <div class="form-row">
                                  <div class="form-group col-12 col-md-12 col-lg-12">
                                      <label for="description">Request Description</label>
                                      <textarea class="form-control @error('description') is-invalid @enderror" name="description"rows="3"></textarea>
                                  </div>
                                   @error('description')
                                      <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                         
                      </div>
                    </div>
                  </div>
                  <!-- /request form -->

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                 </form>
              <!-- /form -->
              </div>
            </div>
          </div>
        </div>
        <!-- /create request Modal -->


      </div>
    </section>
    @endsection