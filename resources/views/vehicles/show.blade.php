@extends('layouts.dashboard')
@section('content')
  <div class="content">
    <div class="row">
        <div class="col-md-12">
          <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title text-primary">Vehicle Details</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Last Mantainance</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Last Service</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Last Route</span>
                      <span class="info-box-number text-center text-muted mb-0">20 <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
                <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title text-primary">
                            <i class="fas fa-text-width"></i>
                           Recent Requests
                          </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          @if($singlevehicle->requests->isEmpty())
                            <p>No Requests Made For This Vehicle Yet</p>
                          @else
                          @foreach($singlevehicle->requests as $Details)
                              <div class="post">
                                <div class="">
                                  <span class="description">Date <i><span class="text-right text-primary" > <?php
                                        $date = date_create($Details->created_at);
                                        echo date_format($date, "d/m/Y");
                                     ?>.</span></i></span>
                                </div>
                                <!-- /.user-block -->
                                <h3>Description</h3>
                                <p>
                                 {{$Details->description}}
                                </p>

                                <!--<p>
                                  <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                                </p>
                              -->
                              </div>
                            @endforeach  
                            @endif
                        </div>
                        <!-- /.card-body -->
                  </div>
                </div>
              <!-- mantainance history -->
              <div class="col-12">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title text-primary">
                  <i class="fas fa-bullhorn"></i>
                  Callouts
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="callout callout-dange r">
                  <h5>I am a danger callout!</h5>

                  <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                    soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.</p>
                </div>
                <div class="callout callout-info">
                  <h5>I am an info callout!</h5>

                  <p>Follow the steps to continue to payment.</p>
                </div>
                <div class="callout callout-warning">
                  <h5>I am a warning callout!</h5>

                  <p>This is a yellow callout.</p>
                </div>
                <div class="callout callout-success">
                  <h5>I am a success callout!</h5>

                  <p>This is a green callout.</p>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
              <!-- /mantainave history -->
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-car"> </i> {{$singlevehicle->reg_no}}</h3>
              <p class="text-muted">vehicle............</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Vehicle Make
                  <b class="d-block">{{$singlevehicle->make}}</b>
                </p>
                <p class="text-sm">Vehicle Type
                  <b class="d-block">{{$singlevehicle->type}}</b>
                </p>
                  <p class="text-sm">Vehicle Engine No
                  <b class="d-block">{{$singlevehicle->eng_no}}</b>
                </p>  <p class="text-sm">Vehicle Mileage
                  <b class="d-block">{{$singlevehicle->mileage}}</b>
                </p>
                  <p class="text-sm">Vehicle Year
                  <b class="d-block">{{$singlevehicle->year}}</b>
                </p>
                 <p class="text-sm">Vehicle Created
                  <b class="d-block">
                      <?php
                              $date = date_create($singlevehicle->created_at);
                              echo date_format($date, "d/m/Y");
                      ?>
                  </b>
                </p>
              </div>
               <!-- documents list -->
              @if($singlevehicle->document->isEmpty())
                <p>No Vehicle files Yet</p>
                @else
                
                <div class="callout callout-info">
                  <h5>Vehicle Files!</h5>
                @foreach($singlevehicle->document as $document)
                  <ul class="list-unstyled">
                     <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{$document->document_name}}</a>
                </li>
                  </ul>
                @endforeach

                </div>
             
               <!--/document list -->
              @endif
              <div class="text-left mt-5 mb-3">
              <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                 Add Vehicle Documents
                </button>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
        </div>
    </div>
  </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Documents</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <!-- form start -->
              <form role="form" action="{{url('/vehicledocuments')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Document Name</label>
                    <input type="text" class="form-control" id="" placeholder="Enter Document Name" name="document_name">
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="" name="attachment">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="vehicle_id" value="{{$singlevehicle->id}}">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection