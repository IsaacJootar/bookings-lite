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



    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
            
              <!-- /.card -->
  
              <div class="card">
                <div class="card card-info">
                    
                
                <!-- /.card-header -->
                <div class="card-body p-0">
                  
                          <!-- /.col -->
          <div class="col-md-14">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details of Created Category </a></li>
                  <a href="{{route('room_category.index')}}" class="btn btn-sm" role="button"> <label> EXIT PAGE </label></a>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                      
                       
                          <h6> <a href="#">CATEGORY NAME EXAMPLE :</a> {{$category->category}}</h6>
                          
  
                      </div>
                      <!-- /.category details-block -->
                      <h6> <a href="#">DETAILS FOR {{$category->category}}</a></h6>
                      <p>
                       {{$category->details}}
                      </p>
                      <h6> <a href="#">SPECIAL OFFERS  EXAMPLE</a></h6>
                      <p>
                      {{$category->wifi}}  
                      <p>
                      {{$category->laundry}}
                      <p>
                      {{$category->breakfast}}
                      <p>
                      {{$category->lunch}}
                      <p>
                 
                      
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                     
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="../../dist/img/{{$category->image}}" alt="Photo">
                        </div>
                        <!-- /.col -->
                       
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      
<p>
                 
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

             
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
                    </div>
                        <!-- /.card-body -->
        
                      
                      </form>
                </div>
                <!-- /.card-body -->
              </div>
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