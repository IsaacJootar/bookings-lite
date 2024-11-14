<!-- Navbar -->
@include('layouts.header')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        
        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
    @include('layouts.stats_bar')
      <!-- /.row -->
    <!-- Main content -->
    
 
    <!-- /.content -->
    <br>


  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    

   
   <!-- Main content -->

   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
        
          <!-- /.card -->

          <div class="card">
            <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"> <label for="Paasword">Update Your Password Here </label></h3>
            </div>           </div>
            <!-- error Message from session -->
           
            <!-- /.card-header -->
            <div class="card-body p-0">
            
                <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="room">Enter Current Password </label>
                        <input type="text" required  name="current_password" class="form-control" id="password" placeholder=" Current password">
                      </div>
                      <div class="form-group">
                        <label for="room">New Password </label>
                        <input type="text" required  name="password" class="form-control" id="Paaword" placeholder="New Password">
                      </div>
                      
                      <div class="form-group">
                        <label for="room">Comfirm New Password </label>
                        <input type="text"  required name="password_confirmation" class="form-control" id="Paaword" placeholder="Comfirm Password">
                      </div>
                      
                     </div>
              
                     

                    
                </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

