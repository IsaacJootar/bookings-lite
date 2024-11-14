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
                <div class="card card-warning">
                    
                <div class="card-header">
                  <h3 class="card-title"> <label for="allocation">Allocate Hotel Rooms : </h3>  <h6>  Assign Categories & Prices to rooms</h6> </label>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  @php
                
                  @endphp
                  <form method="POST" action="{{route('allocation.store')}}">
                    @csrf

                    
                        <div class="card-body">
                          <div class="form-group">

                            <label>Select Hotel Room</label>
                            <select name="room_id"   class="form-control">
                              @foreach ($rooms as $room)
                              <option value="{{$room->id}}">{{$room->name}}</option>
                              @endforeach
                             
                            </select></br>
                           
                            <label>Select Room Category</label>
                            <select name="category_id" class="form-control">
                              @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->category}}</option>
                              @endforeach
                             
                            </select></br>
                            <label for="allocation">Assign value: Price </label>
                            <input type="number" value="{{old('price')}}" required name="price" class="form-control" id="allocation" placeholder=" Example: 35000">
                          </div>
                         
                         </div>
                       
                    </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">allocate</button>
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
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Room</th>
                          <th>Category</th>
                          <th>Value</th>
                        <th>Created time</th>
                        <th>Action</th>
                       
                  
                      </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                      @foreach ($allocations as $allocation)
                    @php $no ++  @endphp
                    
                      <tr>
                       
                      
                        <td>{{$no}}</td>

                        @php
                          
                          
                          @endphp
                        <td>{{Str::ucfirst($room = DB::table('rooms')->where('id', $allocation->room_id)->value('name'))}}
                        </td>
                        
                        <td>{{str::ucfirst($room = DB::table('room_categories')->where('id', $allocation->category_id)->value('category'))}}
                        </td>
                        <td>    {{'₦'.number_format($allocation->price, 2)}}</td>
                        <td>    {{$allocation->created_at}}</td>
                        <form method="POST" action="{{route('allocation.destroy', $allocation)}}">
                          @csrf
                          @method('DELETE')
                        <td><button type="submit"  class="btn btn-sm btn-danger btn-sm"> Remove</a></button></td>

                   
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