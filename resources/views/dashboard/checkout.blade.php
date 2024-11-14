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
     
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
  <?php //include('layouts.stats_bar') ?>
      <!-- /.row -->
    <!-- Main content -->
    
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Confirm Reservation</h5>
            Please confirm your reservation informations carefully before you complete your checkout. 
          </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                   vinehousegroup.com
                  <small class="float-right"> <small> <strong class="badge badge-info"> Current Date: @php echo  Carbon::parse($checkout)->now()->format('l jS \ F Y');
           
          @endphp
          </strong> 
          </small>
                  </small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
               
                <address>
                  
                  795 Folsom Ave, Suite 600<br>
                  San Francisco, Kubwas,Abuja<br>
                  Phone: (080)887676656<br>
                  Email: info@almasaeedstudio.com
                </address>
              </div>
              <!-- /.col -->
             
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Resv. ID</th>
                    <th>Customer</th>
                    <th>Category</th>
                    <th>Room(s)</th>
                    
                    <th>Address</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  
                  <tr>
                    <td>{{$reservation}}</td>
                    <td>{{($fullname=DB::table('reservations')->where('reservation_id', $reservation)->get()->value('fullname'))}}</td>
                    <td>{{(DB::table('room_categories')->where('id', $category_id)->get()->value('category'))}}</td>
                   
                    <td>{{($nor = DB::table('reservations')->where('reservation_id', $reservation)->get()->value('nor'))}}</td>
                    <td>{{(DB::table('reservations')->where('reservation_id', $reservation)->get()->value('address'))}}</td>
                   
                    
                  </tr>
                  <tr>
                    <th>Email</th>
                    <th>Special Requests</th>
                    <th>Phone</th>
                    <th>Medium</th>
                    <th>Booking Date</th>
                   
                  </tr>
                  <tr>
                    <td>{{($email=DB::table('reservations')->where('reservation_id', $reservation)->get()->value('email'))}}</td>
                    <td>{{(DB::table('reservations')->where('reservation_id', $reservation)->get()->value('requests'))}}</td>
                    <td>{{(DB::table('reservations')->where('reservation_id', $reservation)->get()->value('phone'))}}</td>
                    <td>{{(DB::table('reservations')->where('reservation_id', $reservation)->get()->value('medium'))}}</td>
                    <td>
                     
                      @php
                     echo  Carbon::parse($checkin)->format('l jS \ F Y');
                     echo ' - '; 
                     echo  Carbon::parse($checkout)->format('l jS \ F Y');
                     
                    @endphp
                      
                     </td>
                    
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src="../../dist/img/credit/visa.png" alt="Visa">
                <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                <img src="../../dist/img/credit/american-express.png" alt="American Express">

                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
               All online payments are securely handled by <a class="text-theme-colored" target="_blank" href="https://paystack.com/"> Paystack</a>
                </p>
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Total Amount Due</p>

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Price Per Night
                        <small>(Inc. Tax )</small>
                      </th>
                      <td>
                        @php
                       
                        
                        $start =  Carbon::parse($checkin);
                        $end =  Carbon::parse($checkout);
                         $days =  $start->diffInDays($end); // count days in the selected dates//
                         $amount=DB::table('room_allocations')->where('category_id', $category_id)->get()->value('price');
                        $amount= $amount * $nor;
                        echo '₦'.number_format($amount);
                        @endphp
                        </td>
                    </tr>
                    
                    
                    <tr>
                      <th style="width:50%">Number of Nights
                      
                      </th>
                      <td>
                        @php
                       
                     
                         echo $days;
                        
                      
                        @endphp
                        </td>
                    </tr>
                    
                    <tr>
                      <th>Grand Total:</th>
                      <td>@php
                         echo  '₦'.number_format($amount *  $days);
                      @endphp</td>
                    </tr>
                    
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <?php 
            // Variables for paystack API
             if(is_null($email)){
               $email='vinegrouphouse@gmail.com';
             }else{ $email=$email;}
              $amount= $amount * $days;
             $amount=$amount * 100; // convert all amounts to kobo bfor passing to paystack API//
             $reservation_id=$reservation;
             $reference= Paystack::genTranxRef();
             
             // divide this amount by nor to slipt price for multiple reservations
             $amount= $amount / $nor;
          
             ?>
       
       
       
                   <!-- this row will not appear when printing -->
                  <div class="row no-print">
                       <div class="col-12">
                        <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print Reservation </button>
                         
                 <a target="_blank" href="{{route('pay_later', ['amount' => $amount, 'reference'=> $reservation_id,])}}">
                         <button  type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                           <i class="fas fa-walking"></i> Pay on Arrival
                         </button>
                        </a>
                         <a target="_blank" href="{{route('pay', ['amount' => $amount, 'email'=> $email, 'reference'=> $reservation_id,])}}">
                         <button  type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                           <i class="far fa-credit-card"></i> Pay Online Now
                         </button>
                        </a>
                       </div>
                     </div>
                        
                      
                
                       
                     </div>
                   </div>
                 </div>
                 </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>  @include('layouts.footer')
  </div>
  <!-- /.content-wrapper -->
