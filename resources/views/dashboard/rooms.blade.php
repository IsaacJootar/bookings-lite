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
                  <h3 class="card-title"> <label for="room">Create Hotel Room </label></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <form method="POST" action="{{route('rooms.store')}}">
                    @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="room">Enter Name </label>
                            <input type="text" value="{{old('name')}}" required name="name" class="form-control" id="room" placeholder="Example Room 7">
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
            <div class="col-md-6">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-sm" >
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Room</th>
                        <th>Created time</th>
                        <th>Action</th>
                        <th>Action</th>
                       
                  
                      </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                      @foreach ($rooms as $room)
                    @php $no ++  @endphp
                    
                      <tr>
                       
                      
                        <td>{{$no}}</td>
                        <td>    {{ Str::ucfirst($room->name)}}</td>
                        <td>    {{$room->created_at}}</td>
                        <td><button type="submit"       class="btn btn-sm btn-default btn-sm"><a  href="{{route('rooms.edit', $room)}}" > Edit</a></button></td>
                        <form method="POST" action="{{route('rooms.destroy', $room)}}">
                          @csrf
                          @method('DELETE')
                        <td><button type="submit"  class="btn btn-sm btn-danger btn-sm"> Delete</a></button></td>

                   
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