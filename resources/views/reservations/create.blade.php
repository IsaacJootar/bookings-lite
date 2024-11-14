@include('layouts.header-guest')
@php
     use Carbon\Carbon;
  @endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">

        <span class="brand-text font-weight-light">Vine Hotels: Reservations</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

            </div>
            <div class="info">
                <a href="https://vinehousegroup.com/" class="d-block"><i class='fas fa-reply-all'> Return to website</i></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->

    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            Room Reservation for:
            @php
           echo  Carbon::parse($checkin)->format('l jS \ F Y');
           echo ' - '; 
           echo  Carbon::parse($checkout)->format('l jS \ F Y');
           
          @endphp
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">



        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">



                                          </div>

 <!-- Success Message from session -->
 @if(session('success'))
 <div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   {{ session('success') }}
 </div>
@endif

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

                        <div class="row">
                            <div class="col-12">


                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h3 class="card-title">Reservation Form: Please fill Appropriately</h3>
                                    </div>
                                    <!-- /.card-header -->

                                    <div class="card-body">
                                
                                        <form method="post" action="{{route('reservations.store')}}">
                                            @csrf
                                        
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Number of Rooms<strong style="color: red">*
                                                            </strong></label>
                                                        <select required name="nor"
                                                            class="form-control form-control-lg"
                                                            id="exampleSelectBorder">
                                                            @for ($i = 1; $i <= $nor; $i++)
                                                                ;
                                                                <option>{{ $i }}</option>
                                                            @endfor

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Fullname<strong style="color: red">* </strong></label>
                                                        <input name="fullname" value="{{old('fullname')}}" required type="text"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter ...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- text input -->
                                                    <div class="form-group">
                                                        <label>Contact Number<strong style="color: red">*
                                                            </strong></label>
                                                        <input required name="phone" value="{{old('phone')}}" type="number"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter ...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                    <label>Email<strong style="color: red">*</strong></label>
                                                        <input required  name="email" value="{{old('email')}}" type="text"
                                                            class="form-control form-control-lg"
                                                            placeholder="Enter ...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <!-- textarea -->
                                                    <div class="form-group">
                                                        <label>Adress </label>
                                                        <textarea name="address" value="{{old('address')}}" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Any Special Requests? </label>
                                                        <textarea name="requests" value="{{old('requests')}}" class="form-control" rows="3"
                                                            placeholder="E.g:  I want an arranged Pickup from the airport"></textarea>
                                                        <input name="category_id" value="{{$category_id}}"
                                                            style="visibility: hidden">
                                                        <input name="medium" value="online" style="visibility: hidden">
                                                        <input name="checkin" value="{{$checkin}}" style="visibility: hidden">
                                                        <input name="checkout" value="{{$checkout}}" style="visibility: hidden">

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12">

                                                <button type="submit" class="btn btn-dark float-left"><i
                                                        class="far fa-credit-card"></i>
                                                    Check Out
                                                </button>

                                            </div>

                                        </form>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <!-- general form elements disabled -->



                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <h3 class="text-primary">
                            {{ DB::table('room_categories')->where('id', $category_id)->value('category') }}</h3>
                        <p class="text-sm">{{ $nor }} Available Room (s)

                        </p>
                        <p class="text-muted">
                            {{ DB::table('room_categories')->where('id', $category_id)->value('details') }}</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Reservation Type:
                                <b class="d-block">Online</b>
                            </p>

                        </div>

                        <h5 class="mt-5 text-muted">Special Offers</h5>
                        <ul class="list-unstyled">

                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fa fa-wifi"></i>
                                    {{ DB::table('room_categories')->where('id', $category_id)->value('wifi') }}</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fa fa-coffee"></i>
                                    {{ DB::table('room_categories')->where('id', $category_id)->value('breakfast') }}</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fas fa-tshirt"></i>
                                    {{ DB::table('room_categories')->where('id', $category_id)->value('laundry') }}</a>
                            </li>
                            <li>
                                <a href="" class="btn-link text-secondary"><i class="fas fa-concierge-bell"></i>
                                    {{ DB::table('room_categories')->where('id', $category_id)->value('lunch') }}</a>
                            </li>

                            <div class="card-body">
                                <div class="callout callout-danger">
                                    <h5><strong>Hotel Policies</strong></h5>

                                    <p>Unpaid reservation must be confirmed 24 hours prior to arrival by making full
                                        payment

                                    <p> Please note that all special requests are subject to availability and additional
                                        charges may apply
                                    <p>All non-standard rates requires full pre-payment at the time of the booking and
                                        are non refundable nor transferable
                                    <p>Confirmed reservations are non refundable nor transferable</p>
                                </div>

                            </div>
                        </ul>

                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

    @include('layouts.footer')
</div>
<!-- /.content-wrapper -->
