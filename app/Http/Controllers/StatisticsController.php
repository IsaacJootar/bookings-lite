<?php
namespace App\Http\Controllers;
use App\Models\Roomallocation;
use App\Models\Roomcategory;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatisticsController extends Controller
{
// available rooms today
    public function index() {

                $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                $checkout=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'); //working with dates sucks
                $available= Roomallocation::with('category')
                    ->whereDate('checkin','>',  $checkin)
                    ->whereDate('checkout','>', $checkout)
                    ->orWhere('checkin', '=',  '1986-09-01') // my weird date-default for just created rooms
                    ->get()->count();
        return view('layouts.stats_bar', [
            'today' => $available,
        ]);
    }
// booked rooms today
    public function bookedToday() {

        $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
        $checkout=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'); //working with dates sucks
        $available= Roomallocation::with('category')
            ->whereDate('checkin','>',  $checkin)
            ->whereDate('checkout','>', $checkout)
            ->orWhere('checkin', '=',  '1986-09-01') // my weird date-default for just created rooms
            ->get()->count();
return view('dashboard.available_rooms', [
    'today' => $available,
]);
}
    
    
}