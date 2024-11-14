<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Roomallocation;
use App\Models\Roomcategory;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;


class BookingController extends Controller
{

    public function index(Request $request) {

                $checkin=Carbon::now()->timezone('Africa/Lagos')->format('Y-m-d');
                $checkout=Carbon::now()->timezone('Africa/Lagos')->addDays(1)->format('Y-m-d'); //working with dates sucks
                $allocations= Roomallocation::with('category')
                    ->whereDate('checkin','>',  $checkin) // checkin -normal checkin search dates outside of defaults dates during index view
                    ->whereDate('checkout','>', $checkout)  //checkout -normal checkout search dates outside of defaults dates during index view
                    ->orWhere('checkin', '=',  '1986-09-01') // my weird date
                    ->orderBy("id","desc")->distinct()->get('category_id');
                $request->session()->put('checkin', $checkin);
                $request->session()->put('checkout', $checkout);
                $request->session()->put('token', 1); //default for- present day search
                
                return view('dashboard.search', [
                'allocations'=> $allocations,
                
                ]);
            
    }


    public function search (Request $request) {
        $checkin=$request->input('checkin');
        $checkout=$request->input('checkout');
        $allocations= Roomallocation::with('category')
        ->whereNotBetween('checkin', [$checkin, $checkout])
        ->whereNotBetween('checkout', [$checkin, $checkout] )
        ->orderBy("id","desc")->distinct()->get('category_id');

        
        $request->session()->put('checkin', $checkin);
        $request->session()->put('checkout', $checkout);
        $request->session()->put('token', 2);
        
        return view('dashboard.search', [
            'allocations'=> $allocations,]);
            
        }


    

        public function checkout(Reservation $reservation)
        {
            //$dashboard = Reservation::query()->get();   
           
            //return view('dashboard.checkout', compact('reservation'));
        }



    public function create ($category_id, $nor, $checkin,$checkout) {
        return view('dashboard.create')->with([
            'category_id'=> $category_id,
            'nor'=> $nor, 
            'checkin'=>$checkin,
            'checkout'=>$checkout
        ]);
    }

    public function store(Request $request){


        $category_id=$request->input('category_id');
        $nor=$request->input('nor');
        $attributes = request()->validate([
            'category_id'=> [],
            'medium'=>[],
            'payment_status'=>[],
            'nor'=>['required'],
            'fullname'=>['required'],
            'address'=>[''],
            'requests'=>[''],
            'email'=>[''],
            'phone'=>['required'],
            'checkin'=>['required'],
            'checkout'=>['required'],
            
        ]);
        
       

        //get the rooms at ramdom from customer selection and keep record in reservations table

        $allocations=Roomallocation::where('category_id', $category_id)->limit($nor)->get();

        $reservation_id = mt_rand( 10000000, 99999999 );
              foreach ($allocations as $allocation):
    
                    Reservation::create([
                        'category_id'=>$category_id,
                        'room_id'=>$allocation->room_id,
                        'medium'=>$request->input('medium'),
                        'nor'=>$request->input('nor'),
                        'fullname'=>$request->input('fullname'),
                        'address'=>$request->input('address'),
                        'requests'=>$request->input('requests'),
                        'email'=>$request->input('email'),
                        'phone'=>$request->input('phone'),
                        'checkin'=>$request->input('checkin'),
                        'checkout'=>$request->input('checkout'),
                        'reservation_id'=>$reservation_id,

                        
                    ]);
                    

    Roomallocation::where('room_id', $allocation->room_id)
                    ->update(['checkin'=> $request->input('checkin'),'checkout'=> $request->input('checkout')]);
                                      
            endforeach;
            
                             
        
        
            return view('dashboard.checkout')->with([
                'reservation'=> $reservation_id,
                'category_id'=> $category_id,
                'checkin'=>     $request->input('checkin'),
                'checkout'=>    $request->input('checkout'),
                'nor'=>$request->input('nor'),
            ]);
    
}



public function destroy(Reservation $allocation){

    $allocation->delete();
    return to_route ('dashboard.index')->with('success','Room reservation Has Been deleted Successfully');


}
}