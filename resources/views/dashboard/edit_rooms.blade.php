<!-- Navbar -->
@include('layouts.header')
<!-- /.navbar -->

<!-- Main Sidebar Container -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    
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



    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
            
              <!-- /.card -->
  
              <div class="card">
                <div class="card card-info">
                    
                <div class="card-header">
                  <h3 class="card-title"> <label for="rooms">Edit Hotel Room :
                      
                </label></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <form method="POST" action="{{route('rooms.update',$room)}}">
                    @csrf
                    @method('PATCH')
                        <div class="card-body">
                          <div class="form-group">

              
              <label for="category">Update Hotel Room Category </label>
                            <input type="text"
                            name="name" id="room"
                            value="{{$room->name}}"
                             required  class="form-control" id="room">
                          </div>
                          
                         </div>
                       
                    </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('rooms.index')}}" class="btn btn-sm" role="button">Exit</a>
                       
                        </div>
                      </form>
                </div>
              </div>
              <!-- /.card -->
  
              
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        
          <!-- /.row -->
        
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
  </div>
  </section>
</div>
      </section>

  @include('layouts.footer')