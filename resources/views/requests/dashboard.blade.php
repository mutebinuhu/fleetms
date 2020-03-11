@extends('layouts.requests.index')
    @section('content')
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Driver Dashboard</h1>
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
                <i class="fas fa-ticket-alt"></i>
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
          <!-- alert -->
          @if(session('status'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{session('status')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endif
          <!-- /alert -->
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
                @if($getdata->isEmpty())
                 @else
                  <a href="{{url('requests/create')}}" class="btn btn-primary btn-block"><b>Request</b></a>      
                @endif
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
                            @if($request->status == 0)
                            <i>pending</i>
                            @elseif($request->status == 1)
                            <i>approved</i>
                            @endif
                          </span>

                          <h3 class="timeline-header"><a href="#">Reg No:</a>{{$request->reg_no}}</h3>

                          <div class="timeline-body">
                            {{$request->description}}
                          </div>
                          <div class="timeline-footer">
                            @if($request->status == 1)
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
                          @if($request->status == 0)
                            <h3 class="timeline-header"><a href="#">{{Auth::user()->sur_name}}</a> your request is still pending</h3> 
                          @elseif($request->status == 1) 
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

      </div>
    </section>
    @endsection