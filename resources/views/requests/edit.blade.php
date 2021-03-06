@extends('layouts.dashboard')
@section('content')
<!-- section -->
<div class="content">
    <!-- row -->
    <div class="row">
        <!-- col -->
        <!-- about vehicle -->
        <div class="col-sm-12 col-lg-4 col-md-4 my-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Vehicle Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-car mr-1"></i>Reg No:</strong>

                    <p class="text-muted">
                        @foreach($show as $show) <?php echo strtoupper($show->reg_no) ?> @endforeach
                    </p>
                    <hr>
                    <strong><i class="far fa-user mr-1"></i>Driver's Name</strong>
                    <p class="text-muted">{{$show->sur_name ." " . $show->first_name}}</p>
                    <hr>
                    <strong><i class="fas fa-toolbox mr-1"></i>Repair Request Date</strong>
                    <p class="text-muted">
                        <?php
                            $date = date_create($show->created_at);
                            echo date_format($date, "d/m/Y");
                         ?>
                    </p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i>Car Make</strong>

                    <p class="text-muted">{{$show->make}}</p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i>Car Type</strong>
                    <p class="text-muted">{{$show->type}}</p>
                    <hr>
                    <strong><i class="far fa-file-alt mr-1"></i>Car Mileage</strong>
                    <p class="text-muted">{{$show->mileage}}</p>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /about vehicle -->

        <!-- request description -->
        <div class="col-lg-8 col-md-12 col-sm-12 my-2">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Request Description</h3>
                </div>
                <!-- /.card-header -->
                <!-- card body -->
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Repair Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Vehicle History</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <!-- /tabs -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <!-- description form -->
                            <!-- form -->
                            <form action="{{route('requests.update', $show->id)}}" method="POST" enctype="">
                                {{ method_field('PATCH')}}
                                 @csrf
                                <div class="form-group">
                                    <textarea class="form-control" id="Textarea1" rows="3" value="{{$show->description}}" name="description" readonly="">{{$show->description}}</textarea>
                                </div>
                                @if($show->status == 1)
                                    <form action="" method="POST">
                                        @csrf
                                         <div class="form-group">
                                            <button class="btn btn-success" type="button">Repair Request Approved</button>
                                            <a href="{{action('requestscontroller@download', $show->id)}}" class="btn btn-info">Download</a>

                                        <div class="form-group">
                                            <label>Document Name</label>
                                            <input type="text" name="name" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="status_by" value="{{Auth::id()}}">
                                            <input type="hidden" name="status" value="5"> <br> <br>
                                             <label>Upload Document</label>
                                            <input type="file" name="mowt_verification_form">
                                            <button name="submit" type="submit" class="btn btn-info">Upload</button>
                                        </div>
                                    </div>
                                    </form>
                                @elseif($show->status == 3)
                                <div class="form-group">
                                    <button class="btn btn-secondary" type="button">Repair Request Kept Inview</button>
                                        <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status" value="1" onclick="this.form.submit()">
                                            <label class="form-check-label text-success" for="status">Approve</label>
                                        </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input reject" type="radio" name="status" id="status" value="2">
                                        <label class="form-check-label text-danger" for="status">Reject</label>
                                    </div>
                                    <div class="form-group reject-section" style="display: none">
                                        <label for="email" class="">Reason:</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="Textarea1" rows="3" name="reason" placeholder="write something"></textarea>
                                        @error('reason')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                        <input type="hidden" name="status_by" value="{{Auth::id()}}">
                                        <button class="btn btn-danger my-2">Submit</button>
                                    </div>
                                    <input type="hidden" name="owner" value="{{Auth::id()}}">
                                </div>
                                </div>
                                @else
                                <!-- shows the rejected button if status is rejected -->
                                    @if($show->status == 2)
                                    <button class="btn btn-danger btn-block">Request Rejected</button>
                                    @else
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="status" id="status" value="1" onclick="this.form.submit()">
                                            <label class="form-check-label text-success" for="status">Approve</label>
                                        </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input reject" type="radio" name="status" id="status" value="2">
                                        <label class="form-check-label text-danger" for="status">Reject</label>
                                    </div>
                                     <div class="form-check form-check-inline">
                                        <input class="form-check-input reject" type="radio" name="status" id="status" value="3">
                                        <label class="form-check-label text-warning" for="status">Keep In View</label>
                                    </div>
                                    <div class="form-group reject-section" style="display: none">
                                        <label for="email" class="">Reason:</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="Textarea1" rows="3" name="reason" placeholder="write something"></textarea>
                                        @error('reason')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span> @enderror
                                        <input type="hidden" name="status_by" value="{{Auth::id()}}">
                                        <button class="btn btn-danger my-2">Submit</button>
                                    </div>
                                    <input type="hidden" name="owner" value="{{Auth::id()}}">
                                </div>

                                    @endif
                                <!-- /shoe the rejected button if status is rejected -->
                                @endif
                                <!-- checks if the request is approved and the mowt lpo form is uploaded or not -->

                                  
                            </form>
                         
                             
                            <!-- /form -->
                        </div>
                        <!-- /description form -->
                        <!-- vehicle history -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                           <p>
                               No History Yet
                           </p>
                        </div>
                        <!-- /vehicle history -->

                    </div>
                </div>
                <!-- /end tabs -->

                <!-- /card body -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
<!--request description -->
</div>
<!-- /col -->
</div>
<!-- /row -->
</div>
<!-- /section -->
@endsection