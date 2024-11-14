<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomcategoryController;
use App\Http\Controllers\RoomallocationController;
use App\Http\Controllers\AvailableroomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookedroomController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomsdueController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomercheckoutController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// Authentication Routes

  Route::get('/', [ReservationController::class,'index'] )->name('reservations.index');

Route::get('/password', function () {
    return view('auth.reset-password');
})->middleware(['auth', 'verified'])->name('password');


route::view('/addstaff','addstaff');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('welcome');

Route::get('/calender', function () {
    return view('calender');
})->middleware(['auth', 'verified'])->name('calender');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





// RoomCategory routes
Route::middleware('auth')->group(function(){


    Route::get('/dashboard/room_category', [RoomCategoryController::class,'index'])->name('room_category.index');
    Route::get('/dashboard/room_category/{category}', [RoomcategoryController::class, 'show'])->name('room_category.show');
    Route::post('/dashboard/room_category', [RoomcategoryController::class,'store'] )->name('room_category.store');
    Route::get('/dashboard/room_category/{category}/edit', [RoomCategoryController::class, 'edit'] )->name('room_category.edit');
    Route::patch('/dashboard/room_category/{category}', [RoomcategoryController::class, 'update'] )->name('room_category.update');
    Route::delete('/dashboard/room_category/{category}', [RoomcategoryController::class, 'destroy'] )->name('room_category.destroy');
});


// RoomAllocation routes


Route::middleware('auth')->group(function(){
    Route::get('/dashboard/room_allocation', [RoomallocationController::class,'index'])->name('allocation.index');
    Route::post('/dashboard/room_allocation', [RoomallocationController::class,'store'] )->name('allocation.store');
    Route::delete('/dashboard/room_allocation/{allocation}', [RoomallocationController::class, 'destroy'] )->name('allocation.destroy');

    // RoomAavailable routes
    Route::get('/dashboard/available', [AvailableroomController::class,'index'])->name('available.index');

    // RoomBooked routes
    Route::get('/dashboard/booked', [BookedroomController::class,'index'])->name('booked.index');
    
    
    // RoomsDue routes
    Route::get('/dashboard/rooms_due', [RoomsdueController::class,'index'])->name('rooms_due.index');
    Route::post('/dashboard/rooms_due', [RoomsdueController::class,'due'])->name('rooms_due.due');
    Route::get('/dashboard/rooms_due/{reservation_id}/{room_id}/{category_id}', [RoomsdueController::class,'checkout'])->name('rooms_due.checkout');

    //customer_checkout
    Route::post('/customer_checkout/{reservation_id}', [CustomercheckoutController::class,'checkout'])->name('customer_checkout.checkout');
    

});
    // Reservations Routes//

    Route::get('/reservations', [ReservationController::class,'index'] )->name('reservations.index');
    Route::post('/reservations/search', [ReservationController::class,'search'] )->name('reservations.search');
    Route::get('/reservations/checkout/',[ReservationController::class,'checkout'] )->name('reservations.checkout');
    Route::post('/reservations', [ReservationController::class,'store'] )->name('reservations.store');
    Route::get('/reservations/create/{category_id}/{nor}/{checkin}/{checkout}', [ReservationController::class,'create'] )->name('reservations.create');
    //Route::get('/reservations/comfirm',[ReservationController::class,'comfirm'] )->name('reservations.comfirm');
    Route::patch('/reservations/reservation',[ReservationController::class,'update'] )->name('reservations.update');
    Route::delete('/reservations/reservation', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    // Booking Routes//
Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [BookingController::class,'index'] )->name('dashboard.index');
    Route::post('/dashboard/search', [BookingController::class,'search'] )->name('dashboard.search');
    Route::get('/dashboard/checkout/',[BookingController::class,'checkout'] )->name('dashboard.checkout');
    Route::post('/dashboard', [BookingController::class,'store'] )->name('dashboard.store');
    Route::get('/dashboard/create/{category_id}/{nor}/{checkin}/{checkout}', [BookingController::class,'create'] )->name('dashboard.create');
    Route::patch('/dashboard/reservation',[BookingController::class,'update'] )->name('dashboard.update');
    Route::delete('/dashboard/reservation', [BookingController::class, 'destroy'])->name('dashboard.destroy');

});
    
    // Rooms routes
Route::middleware('auth')->group(function(){
    Route::get('/dashboard/rooms', [RoomsController::class,'index'])->name('rooms.index');
    Route::post('/dashboard/rooms', [RoomsController::class,'store'] )->name('rooms.store');
    Route::get('/dashboard/rooms/{room}/edit', [RoomsController::class, 'edit'] )->name('rooms.edit');
    Route::patch('/dashboard/rooms/{room}', [RoomsController::class, 'update'] )->name('rooms.update');
    Route::delete('/dashboard/rooms/{room}', [RoomsController::class, 'destroy'] )->name('rooms.destroy');

});

    //Routes for offline Payments
 Route::get('/pay_later/{amount}/{reference}', [PaymentController::class,'pay_later'])->name('pay_later'); // reference-reservation ID
    

    
    
    //Routes for paystack Payments
    Route::get('/pay/{amount}/{email}/{reference}', [PaymentController::class,'pay'])->name('pay'); // reference-reservation ID
    
    
    Route::get('/payment/callback',[PaymentController::class, 'handleGatewayCallback'])->name('reservations.comfirm');
    // http://reservations.vinehousegroup.com/comfirm



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
