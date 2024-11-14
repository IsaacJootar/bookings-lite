<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Roomcategory;
use App\Models\Room;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BookedroomController extends Controller
{
    public function index() {

        $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
        $checkout=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'); //working with dates sucks
        
$book = $this_month = Reservation::whereYear('created_at', Carbon::now()->year)
                             ->where('payment_status', '!=', '')
                             ->distinct('reservation_id')->get();

        $rooms= Room::query()->orderBy("id","desc")->get();
        $categories= Roomcategory::orderBy("id","desc")->get();
        
    return view('dashboard.booked_rooms', [
            'books' => $book,
            'rooms'=> $rooms,
            'categories'=> $categories,
            'checkin'=>$checkin,
            'checkout'=>$checkout,
        ]);
    }
    
}
