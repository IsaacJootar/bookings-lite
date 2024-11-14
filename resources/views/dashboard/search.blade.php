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



  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
  <script>
    $( function() {
      
        from = $( "#from" )
          .datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            dateFormat: 'yy-mm-dd',
          })
          .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
          }),
        to = $( "#to" ).datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat: 'yy-mm-dd',
        })
        .on( "change", function() {
          from.datepicker( "option", "maxDate", getDate( this ) );
        });
   
      function getDate( element ) {
        var date;
        try {
          date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
          date = null;
        }
   
        return date;
      }
    } );
    </script>
  
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      
 <!-- Success Message from session -->

<!-- error Message from session -->
@if ($errors->any())
<div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
</div>
     @endif
      <div class="callout callout-info">
        <form method="POST" action="{{route('dashboard.search')}}">
          @csrf
        
   
        
          @php
          use Carbon\Carbon;
      
         if (session()->get('token') == 1){// from index
          $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
          $checkout=Carbon::now()->addDays(1)->timezone('Africa/Lagos')->format('Y-m-d'); // working with dates is exhuasting 
         } 
          
         if (session()->get('token') == 2){ //from search
          $checkin= session('checkin');
          $checkout=session('checkout');
         } 
          
         
        @endphp
            
            
           <div class="card-body">
         
            <div class="row">
              <div class="col-5">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input  class="form-control form-control" name="checkin" placeholder="Check In" type="text" id="from" required>
                </div>
              </div>
              <div class="col-5">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                  </div>
                  <input  class="form-control form-control" name="checkout" placeholder="Check Out" type="text" id="to" required>
                </div>
              </div>
              <div class="col-2">
                <div class="input-group mb-3">
                  
                  <button type="sumbit" class="btn btn-secondary btn float-right btn-flat">Search Rooms</button>
                </div>
              </div>
             
            </div>
            <div style="text-align:center;"> Available rooms below are from time period:<strong>   {{$checkin}} -  {{ $checkout}} </strong></div>
          </div>
        </form>
       
      </div>
    
      <!-- Default box -->
      <div class="card card-solid">
        @foreach ($allocations as $allocation)
        <div class="card-body">
        
          <div class="row">
          
            <div class="col-12 col-sm-6">
             
              <div class="col-8">
                <img src="/public/dist/img/{{$allocation->category->image}}" class="product-image" alt="Product Image">
                
              </div>
             
            </div>
            <div class="col-12 col-sm-6">
              
              <h3 class="my-2"> {{ $allocation->category->category}}</h3>
              <strong>{{$count=DB::table('room_allocations')
              ->where('category_id', $allocation->category_id)
              ->whereNotBetween('checkin', [session('checkin'), session('checkout')])
              ->whereNotBetween('checkout', [session('checkin'), session('checkout')] )
              ->get()->count()}} Available Room (s)
             
               </strong>
          

              <p>{{ $allocation->category->details}}.</p>
              <hr>
              <h4>Special Offers</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Wifi
                  <br>
@php
  if(isset($allocation->category->wifi)){
   echo '<i class="fas fa-check fa-1x text-green"></i>';
  }
@endphp
                  
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Breakfast
                  <br>
                  @php
                  if(isset($allocation->category->breakfast)){
                   echo '<i class="fas fa-check fa-1x text-yellow"></i>';
                  }
                @endphp
                          
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Laundry
                  <br>
                  @php
                  if(isset($allocation->category->laundry)){
                   echo '<i class="fas fa-check fa-1x text-purple"></i>';
                  }
                @endphp
                          
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                Lunch
                  <br>
                  @php
                  if(isset($allocation->category->lunch)){
                   echo '<i class="fas fa-check fa-1x text-blue"></i>';
                  }
                @endphp
                          
                </label>
              
              </div><p><p><p><p>

            
              <div class="bg-gray py-1 px-3 mt-1">
                <h2 class="mb-0">

                 Price: {{'₦'.number_format(DB::table('room_allocations')->where('category_id', $allocation->category_id)->get()->value('price'))}}
                
            
                </h2>
                <h4 class="mt-0">
                  <small>Per Night (Inc. Tax )</small>
                </h4>
              </div>
              <a href="{{route('dashboard.create', ['category_id' => $allocation->category_id, 'nor'=> $count, 'checkin'=> $checkin, 'checkout'=> $checkout])}}">
              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                 Make Reservation Here
                </div>
              </a>
                <div class="btn btn-default btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Discount Code?
                </div>
              </div>

              

            </div>
         
     
          <div class="row mt-4">
            
            
          </div>
        </div>
        <hr>
        @endforeach 
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    
  @include('layouts.footer')
  </div>
  <!-- /.content-wrapper -->
