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
            <div class="col-md-6">
            
              <!-- /.card -->
  
              <div class="card">
                <div class="card card-info">
                    
                <div class="card-header">
                  <h3 class="card-title"> <label for="category">Create Room Category </label></h3>
                </div>
                <!-- /.card-header -->
             
                  
                          <!-- /.col -->
          <div class="col-md-14">
            <div class="card">
              
              <div class="card-body">   
                  
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                 
                    <form method="POST" enctype="multipart/form-data" action="{{route('room_category.store')}}">
                      @csrf
                      <div class="form-group">
                        <label for="category">Enter Room Category </label>
                        <input type="text" value="{{old('category')}}" required name="category" class="form-control" id="category" placeholder="Example Delux">
                      </div>
                      <div class="form-group">
                        <label for="details">Room Category Details </label>
                        <textarea  value="{{old('details')}}" required name="details" class="form-control" id="details" ></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label for="category">Special Offers </label>
                        <div class="form-check">
                          <input value="Lunch" name="lunch" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Free Lunch</label>
                        </div>
                        <div class="form-check">
                          <input value="WiFi" name="wifi" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Free WiFi</label>
                        </div>
                        <div class="form-check">
                          <input value="Laundry" name="laundry" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Free Laundry</label>
                        </div>
                        <div class="form-check">
                          <input value="Breakfast" name="breakfast" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Free Breakfast</label>
                        </div>
                      </div>
                      <label for="category">Room Category Image</label><p>
                      Uploaded Images should be clear, beautiful and catchy
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                      </div>
                     
                   
                      <div class="form-group row">
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Create Now</button>
                        </div>
                      </div>
                    </form>
                
                  <!-- /.tab-pane -->
               
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
                   
                        <!-- /.card-body -->
        
                      
                      </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Room Category</th>
                        <th>Created time</th>
                        <th>Action</th>
                        <th>Action</th>
                        <th>Action</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                      @foreach ($categories as $category)
                    @php $no ++  @endphp
                    
                      <tr>
                      
                        <td>{{$no}}</td>
                        <td>    {{ Str::ucfirst($category->category)}}</td>
                        <td>    {{$category->created_at}}</td>
                        <td><button type="submit"       class="btn btn-sm btn-default btn-sm"><a  href="{{route('room_category.show', $category)}}" > View</a></button></td>
                        <td><button type="submit"       class="btn btn-sm btn-default btn-sm"><a  href="{{route('room_category.edit', $category)}}" > Edit</a></button></td>
                        <form method="POST" action="{{route('room_category.destroy', $category)}}">
                          @csrf
                          @method('DELETE')
                        <td><button type="submit"       class="btn btn-sm btn-danger btn-sm"> Delete</a></button></td>

                   
                      </form>
                     @endforeach
                      </tr>
                     
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <div class="card">
                
                <!-- /.card-header -->
                
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