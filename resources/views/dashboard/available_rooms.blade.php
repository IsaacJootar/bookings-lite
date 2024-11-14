<!-- Navbar -->
@include('layouts.header')
<!-- /.navbar -->
@php
  use Carbon\Carbon;
@endphp
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
    <style>
.ui-datepicker {
   background: #333;
   border: 1px solid #29a7ce;
   color: #EEE;
}
</style>
         
               
    <br>



    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
            
              <!-- /.card -->
  
              <div class="card">
                <div class="card card-success">
                    
                <div class="card-header">
                  <class="card-title"> 
                    <small>
              <label for="available"> Available Rooms for today: 
                    @php
                    echo  Carbon::parse($checkin)->format('l jS \ F Y');
                    
                   @endphp
                  </small>
              </label>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  @php
                    use App\Models\Room;
                  @endphp
                  
                        
                       
                    </div>
                    

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-11">
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
                        <th>Status</th>
                       
                  
                      </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                      @foreach ($availables as $available)
                    @php $no ++  @endphp
                    
                      <tr>
                       
                      
                        <td>{{$no}}</td>

                        @php
                          
                          
                          @endphp
                        <td>{{Str::ucfirst($room = DB::table('rooms')->where('id', $available->room_id)->value('name'))}}
                        </td>
                        
                        <td>{{str::ucfirst($room = DB::table('room_categories')->where('id', $available->category_id)->value('category'))}}
                        </td>
                        <td>    {{'₦'.number_format($available->price, 2)}}</td>
                        <td>    {{$available->created_at}}</td>
                       
                        <td><label   class="badge badge-success"> Available</a></lable></td>

                   
                     
                     @endforeach
                      </tr>
                     
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
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