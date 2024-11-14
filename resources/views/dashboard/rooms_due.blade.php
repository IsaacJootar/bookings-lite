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
    
 
    <!-- /.content -->
    <br>



    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4">
            
              <!-- /.card -->
  
              <div class="card">
                <div class="card card-danger">
                    
                <div class="card-header">
                  <h3 class="card-title"> <label for="reservation">Booked Rooms that are Due for Checkout </h3> </label>
                </div>
                <!-- /.card-header -->
              
                  @php
                
                  @endphp
                  <form method="POST" action="{{route('rooms_due.due')}}">
                    @csrf

                    
                        <div class="card-body">
                          <div class="form-group">

                            <label>Select Search Period</label>
                            <select required name="due_period"   class="form-control">
                            <option value="today"> Today </option>
                            <option value="tomorrow"> Tomorrow </option>
                            <option value="next"> Next Tomorrow </option>
                            <option  value="three">3 days from now</option>
                            <option value="week"> One week from now </option>
                 
                            </select></br>                      
                                     
                          
                          </div>
                         
                         </div>
                       
                    
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                      </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Room</th>
                          <th>Category</th>
                          <th>Reservation ID</th>
                        <th>Check Out Date</th>
                              <th>Action</th>
                     
                       
                  
                      </tr>
                    </thead>
                    <tbody>
                    @php $no = 0 @endphp
                      @foreach ($reservations as $reservation)
                    @php $no ++  @endphp
                    
                      <tr>
                       
                      
                        <td>{{$no}}</td>

                        @php
                          
                          
                          @endphp
                        <td>{{Str::ucfirst($room = DB::table('rooms')->where('id', $reservation->room_id)->value('name'))}}
                        </td>
                        
                        <td>{{str::ucfirst($room = DB::table('room_categories')->where('id', $reservation->category_id)->value('category'))}}
                        </td>
                        <td>    {{$reservation->reservation_id}}</td>
                        <td>    {{$reservation->checkout}}</td>
                        <td>
                             <a  href="{{route('rooms_due.checkout',
                              [
                             'reservation_id' => $reservation->reservation_id,
                              'room_id' => $reservation->room_id,
                              'category_id' => $reservation->category_id
                              
                              ]
                              )}}">
                         <button  type="button" class="btn btn-sm btn-danger btn-sm">
                           <i class="fas fa-check"></i> Checkout
                         </button>
                        </a>
                        </td>          
                 
                         
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