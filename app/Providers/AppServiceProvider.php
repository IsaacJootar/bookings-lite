<?php

namespace App\Providers;
use App\Models\Roomallocation;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
                // share variables to start_bar


                // available rooms today
                $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                $checkout=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d'); //working with dates sucks
                
                $available= Roomallocation::whereDate('checkin', '=',  '1986-09-01')  //more than future dates
                    ->get()->count();
                    view::share('today', $available);
                    
            
                     //Booked rooms today
                     $booked= Reservation::with('category')
                     ->whereYear('created_at', Carbon::now()->year)
                     ->whereMonth('created_at', Carbon::now()->month)
                     ->whereDay('created_at', Carbon::now()->day)
                             ->count();
                            
                    view::share('booked', $booked);
                    
            
                // reservations this month   
                $this_month = Reservation::whereYear('created_at', Carbon::now()->year)
                             ->whereMonth('created_at', Carbon::now()->month)
                             ->distinct('reservation_id')
                             ->count();
                            

                    view::share('this_month', $this_month);


                      // Available Rooms    
                $rooms = Room::query()->count();
               

                view::share('rooms', $rooms);

    }


}
