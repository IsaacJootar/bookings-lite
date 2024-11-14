<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Roomcategory;
use App\Models\Roomallocation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomsdueController extends Controller
{

    public function index() {

     $due_today = Carbon::today()->timezone('Africa/Lagos')->format('Y-m-d');
       $reservations= Reservation::whereDate('checkout', $due_today )
        ->Where('payment_status', '!=',  'checked out') 
        ->orderBy("id","desc")->get();

        $rooms= Room::orderBy("id","desc")->get();
        $categories= Roomcategory::orderBy("id","desc")->get();
        return view('dashboard.rooms_due', [
            'reservations' => $reservations,
            'rooms'=> $rooms,
            'categories'=> $categories
        ]);



        
    }
    


    public function due(Request $request) {
        $due_period = $request->input('due_period');

        switch ($due_period) {
            case 'today':
                $period = Carbon::today()->timezone('Africa/Lagos')->format('Y-m-d');
                $reservations= Reservation::whereDate('checkout', $period)
                 ->Where('payment_status', '!=',  'checked out') 
                ->orderBy("id","desc")->get();

            break;
            

            case 'tomorrow':
                $tomorrow = Carbon::tomorrow()->timezone('Africa/Lagos')->format('Y-m-d');
                $reservations= Reservation::whereDate('checkout', $tomorrow)
                 ->Where('payment_status', '!=',  'checked out') 
                ->orderBy("id","desc")->get();

            break;
            
            case 'next':
                $next = Carbon::now()->addDays(2)->timezone('Africa/Lagos')->format('Y-m-d');
                $reservations= Reservation::whereDate('checkout', $next)
                 ->Where('payment_status', '!=',  'checked out') 
                ->orderBy("id","desc")->get();

            break;
            case '3days':
                $three = Carbon::now()->addDays(3)->timezone('Africa/Lagos')->format('Y-m-d');
                $reservations= Reservation::whereDate('checkout', $three)
                 ->Where('payment_status', '!=',  'checked out') 
                ->orderBy("id","desc")->get();

            break;
            case '4days':
                $four = Carbon::now()->addDays(4)->timezone('Africa/Lagos')->format('Y-m-d');
                $reservations= Reservation::whereDate('checkout', $four)
                 ->Where('payment_status', '!=',  'checked out') 
                ->orderBy("id","desc")->get();

            break;

            case 'week':
                $week = Carbon::now()->addDays(7)->timezone('Africa/Lagos')->format('Y-m-d');
                $reservations= Reservation::whereDate('checkout', $week)
                 ->Where('payment_status', '!=',  'checked out') 
                ->orderBy("id","desc")->get();

            break;
            
            default:
            $period = Carbon::today()->timezone('Africa/Lagos')->format('Y-m-d');
            $reservations= Reservation::whereDate('checkout', $period)
             ->Where('payment_status', '!=',  'checked out') 
            ->orderBy("id","desc")->get();
                break;
        }
        $rooms= Room::orderBy("id","desc")->get();
        $categories= Roomcategory::orderBy("id","desc")->get();
        return view('dashboard.rooms_due', [
            'reservations' => $reservations,
            'rooms'=> $rooms,
            'categories'=> $categories
        ]);
    }
    
    
    public function checkout($reservation_id, $room_id, $category_id){
        
        Roomallocation::where('category_id', $category_id)
                        ->where('room_id', $room_id)
                        ->update([
                    'checkin'=>'1986-09-01',
                    'checkout'=>'1986-09-01',
                    ]);
                    
        Reservation::where('reservation_id', $reservation_id)
                ->update([
                    'payment_status'=>'checked out',
                    ]);

        return to_route ('rooms_due.index')->with('success','Customer  Has Been Checked Out Successfully');

    }
    



}