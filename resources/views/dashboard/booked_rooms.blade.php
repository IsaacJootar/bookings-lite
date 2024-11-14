




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
                <div class="card card-info">
                    
                  <div class="card-header">
                    <class="card-title"> 
                      <small>
                <label for="available"> Booked Rooms
                     
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
                  
                  <table id="example1" class="table table-bordered table-striped table-lg">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Room</th>
                          <th>Category</th>
                           <th>Checkin</th>
                             <th>CheckOut</th>
                          <th>Value</th>
                          <th>Reservation ID</th>
                            <th>Payment Medium</th>
                           <th>Payment Status</th>
                            <th>Customer</th>
                             <th>Adress</th>
                              <th>Phone</th>
                               <th>Email</th>
                           
                        <th>Created time</th>
                        <th>Status</th>
                       
                  
                      </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                      @foreach ($books as $booked) 
                    @php $no ++  @endphp
                    
                      <tr>
                       
                      
                        <td>{{$no}}</td>

                        @php
                          
                          
                          @endphp
                        <td>{{Str::ucfirst($room = DB::table('rooms')->where('id', $booked->room_id)->value('name'))}}
                        </td>
                        
                        <td>{{str::ucfirst($room = DB::table('room_categories')->where('id', $booked->category_id)->value('category'))}}
                        </td>
                        <td>    {{$booked->checkin}}</td>
                        <td>    {{$booked->checkout}}</td>
                        <td>    {{'₦'.number_format($booked->amount_paid, 2)}}</td>
                         <td>    {{$booked->reservation_id}}</td>
                        <td>    {{$booked->medium}}</td>
                         <td>   {{$booked->payment_status}}</td>
                        <td>   {{$booked->fullname}}</td>
                        <td>   {{$booked->adress}}</td>
                        <td>   {{$booked->phone}}</td>
                        <td>   {{$booked->email}}</td>
                        <td>    {{$booked->created_at}}</td>
                       
                        <td><label   class="badge badge-warning"> Booked</a></lable></td>

                   
                     
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