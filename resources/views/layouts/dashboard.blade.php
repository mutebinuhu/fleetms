<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('css/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
   <link rel="stylesheet" href="{{asset('css/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('css/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href=" //cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <!-- animate css -->
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
  <!-- animate css -->
</head>
<body>
  <div class="wrapper">
      <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- /logout -->
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!----- user config----->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu  dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cogs mr-2"></i> Settings
          </a>
          <div class="dropdown-divider"></div>

          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt mr-2"></i>
              {{ __('Logout') }}

          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">Fleet</span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://yinnepal.files.wordpress.com/2017/11/admin.png?w=640" alt="User Image">

        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->first_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>
          <!-- deiver routst -->
        @switch(Auth::user()->role)
           @case ('driver')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-car" aria-hidden="true"></i>
              <p>
                   REPAIR REQUESTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{'#'}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved requests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{'#'}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Requests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{'#'}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>create Request</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-car" aria-hidden="true"></i>
              <p>
                   SETTINGS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Settings</p>
                </a>
              </li>
            </ul>
          </li>
          @break
          @case('to')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-car nav-icon" aria-hidden="true"></i>
              <p>
                VEHICLES
                <i class="fas fa-angle-left right"></i>       
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/vehicles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View vehicles</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
              <p>
                SETTINGS
                <i class="fas fa-angle-left right"></i>       
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Settings</p>
                </a>
              </li>
            </ul>
          </li>
          @break
          @case('admin')
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>
                USERS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('users/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('users/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-car nav-icon" aria-hidden="true"></i>
              <p>
                VEHICLES
                <i class="fas fa-angle-left right"></i>       
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/vehicles')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View vehicles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('vehicles/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add vehicles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('vehicleallocation')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Allocate vehicles</p>
                </a>
              </li>
            </ul>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fa fa-cog nav-icon" aria-hidden="true"></i>
              <p>
                SETTINGS
                <i class="fas fa-angle-left right"></i>       
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('#')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Settings</p>
                </a>
              </li>
            </ul>
          </li>
          </li>
          @break
        <!-- links -->   
      </nav>

    @endswitch
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
          <!-- header -->
      <!-- /.sidebar-menu -->
      <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <!-- role case to output dasboard title basing on role -->
                  @switch(Auth::user()->role)
                    @case('Transport Officer')
                     <h1>Transport Officer's Dashboard</h1>
                     @break
                    @case('Admin')
                     <h1>Admin's Dashboard</h1>
                     @break
                    @case('Driver')
                     <h1>Driver's Dashboard</h1>
                     @break
                  @endswitch
                  <!-- end switch -->
                </div>
                <!-- success alert -->
                   <div class="col-sm-12 col">
                    @if(session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>{{session('status')}}</strong> 
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  @endif
                   </div>
                  <!-- /success alert -->
              </div>
            </div>
            <!-- /.container-fluid -->
          </section>
      <!-- /header -->
    @yield('content')
  </div>
  </div>
<!-- data tables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready( function () {
    $(".reject").click(function(){
      $('.reject-section').show();
      $('.reject-btn').show();

    })
} );
</script>
<script src="{{asset('js/plugins/jquery/jquery.js')}}"></script>
<script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('js/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('js/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('js/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('js/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('js/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('js/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('js/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('js/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('js/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('js/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/pages/demo.js')}}"></script>
</body>
</html>
