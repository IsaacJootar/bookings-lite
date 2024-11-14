<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>VineGroup</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
       
        <div class="navbar-search-block">
     
          <li class="breadcrumb-item active">Welcome: <strong> {{Auth::user()->fullname}}</strong></li>
       
        </div>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('welcome')}}" class="brand-link">
     
      <span class="brand-text font-weight-light">PHCS ABUJA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <br>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


               <li class="nav-item">
                <a href="{{route('room_category.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-building"></i>
                  <p>
                  Rooms Category
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('rooms.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>
                   Create Rooms
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('allocation.index')}}" class="nav-link">
                  <i class="nav-icon far fa-calendar-minus"></i>
                  <p>
                    Rooms Allocation
                  </p>
                </a>
              </li>
          
              <li class="nav-item">
                <a href="{{ route('dashboard.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                    Book a Room
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('available.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                 Available Rooms
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('booked.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                  Booked Rooms
                  </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('rooms_due.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-city"></i>
                  <p>
                  Due Rooms
                  </p>
                </a>
              </li>
             

              <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                  <i class="nav-icon fab fa-buromobelexperte"></i>
                  <p>
                  Room Status 
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                  <i class="nav-icon fab fa-buromobelexperte"></i>
                  <p>
                   Room Checkouts
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                  <i class="nav-icon fab fa-buromobelexperte"></i>
                  <p>
                   Manage Room Status
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('password')}}" class="nav-link">
                      <i class="fas fa-lock nav-icon"></i>
                      <p>Change Password</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="fas fa-id-card nav-icon"></i>
                      <p>Update Profile</p>
                    </a>
                  </li>
                  <form method="post" action="{{route('logout')}}">
                    @csrf
              
                    <button type="submit"  class="nav-link">
              
                     logout
                    </button>
                  </form>
                  </li>
                </ul>
              </li>
    
              
            </ul>
          </li>
          
          
         
  
 
  </aside>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->

<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>


</body>
</html>