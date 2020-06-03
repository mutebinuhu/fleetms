@extends('layouts.dashboard')
@section('content')
	<div class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-primary card-outline my-5">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="https://previews.123rf.com/images/jovanas/jovanas1606/jovanas160600554/59285177-car-icon-with-long-shadow.jpg">
                </div>

                <h3 class="profile-username text-center">Car Details</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Reg No</b> <a class="float-right">{{$singlevehicle->reg_no}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Make</b> <a class="float-right">{{$singlevehicle->make}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Eng No</b> <a class="float-right">{{$singlevehicle->eng_no}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Type</b> <a class="float-right">{{$singlevehicle->type}}</a>
                  </li><li class="list-group-item">
                    <b>Mileage</b> <a class="float-right">{{$singlevehicle->mileage}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Year</b> <a class="float-right">{{$singlevehicle->year}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>created</b> <a class="float-right">
                       <?php
                              $date = date_create($singlevehicle->created_at);
                              echo date_format($date, "d/m/Y");
                           ?>.
                    </a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
			</div>
		</div>
	</div>
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
                  <h4>Recent Requests</h4>
                  <!-- returns all requests of the vehicle using has many relationship in the vehicle model -->
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

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>
                @endforeach  
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-car"> </i> {{$singlevehicle->eng_no}}</h3>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block">Deveint Inc</b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">Tony Chicken</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
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