<?php
namespace App\Http\Controllers;

use App\Models\Roomallocation;
use App\Models\Roomcategory;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomallocationController extends Controller
{

    public function index() {

        $allocations= Roomallocation::orderBy("id","desc")->get();
        $rooms= Room::orderBy("id","desc")->get();
        $categories= Roomcategory::orderBy("id","desc")->get();
        return view('dashboard.room_allocation', [
            'allocations' => $allocations,
            'rooms'=> $rooms,
            'categories'=> $categories
        ]);
    }
    
    public function store(Request $request){
        $attributes = request()->validate([
            'room_id'=>['required'],
            'category_id'=>['required'],
            'price'=>['required', 'numeric'],
            
        ]);
        if(\DB::table('room_allocations')->where('room_id', $attributes['room_id'])
                                         ->where('category_id', $attributes['category_id'])->exists()){
         throw ValidationException::withMessages(['message'=>['This room and category combination is already scheduled']]);
                                        
        }



        Roomallocation::create($attributes);
        return to_route ('allocation.index')->with('success','Room allocation was Successful');

    
}


public function destroy(Roomallocation $allocation){

    $allocation->delete();
    return to_route ('allocation.index')->with('success','Room allocation Has Been deleted Successfully');


}
}