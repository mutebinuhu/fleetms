@extends('layouts.dashboard')
@section('content')
  <div class="content">
    <div class="row">
        <div class="col-md-12">
          <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Vehicle Details</h3>

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
                      <span class="info-box-text text-center text-muted">Driver</span>
                      <span class="info-box-number text-center text-muted mb-0">2300</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Requests</span>
                      <span class="info-box-number text-center text-muted mb-0">2000</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Approved</span>
                      <span class="info-box-number text-center text-muted mb-0">20 <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">
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
              </div>
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
              <h5 class="mt-5 text-muted">Vehicle Files</h5>
               <!-- documents list -->
              @if($singlevehicle->document->isEmpty())
                <p>No Vehicle files Yet</p>
                @else
                <ul class="list-unstyled">
                @foreach($singlevehicle->document as $document)
                  <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i>{{$document->document_name}}</a>
                </li>
                @endforeach
              </ul>
               <!--/document list -->
              @endif
              <div class="text-left mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
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
@endsection