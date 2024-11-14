<?php
namespace App\Http\Controllers;
use App\Models\Roomallocation;
use App\Models\Roomcategory;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AvailableroomController extends Controller
{

    public function index() {

                $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                $checkout=Carbon::now()->timezone('Africa/Lagos')->addDays(1)->format('Y-m-d'); //working with dates sucks
                $available= Roomallocation::with('category')
                    ->whereDate('checkin','>',  $checkin)
                    ->whereDate('checkout','>', $checkout)
                    ->orWhere('checkin', '=',  '1986-09-01') // my weird date-default for just created rooms
                    ->orderBy('id', 'desc')->get();
        $rooms= Room::query()->orderBy("id","desc")->get();
        $categories= Roomcategory::query()->orderBy("id","desc")->get();

            //format date and pass to view
        $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
        $checkout=Carbon::now()->addDays(1)->timezone('Africa/Lagos')->format('Y-m-d'); 
        return view('dashboard.available_rooms', [
            'availables' => $available,
            'rooms'=> $rooms,
            'categories'=> $categories,
            'checkin'=>$checkin,
            'checkout'=>$checkout,
        ]);
    }
    
    
}