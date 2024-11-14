<?php
namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomsController extends Controller
{

    public function index() {

        $room= Room::query()->orderBy("id","desc")->get();
        return view('dashboard.rooms', ['rooms' => $room]);
    }
    
    public function store(Request $request){
        $attributes = request()->validate([
            'name'=>['required','min:4', 'unique:rooms,name'],
        ]);
        Room::create($attributes);
        return to_route ('rooms.index')->with('success','Room Has Been Created Successfully');



        

    
}



public function edit(Room $room) {
    return view('dashboard.edit_rooms',
     ['room' => $room]);

}

public function update(Room $room){
    $attributes = request()->validate([
        'name'=>['required','min:2','unique:rooms,name']
    ]);
    $room->update($attributes);
    //$room->update(['room'=> $attributes['room']]); this too will work
    return to_route ('rooms.index')->with('success','Room Has Been updated Successfully');


}

public function destroy(Room $room){

    if(\DB::table('room_allocations')->where('room_id', $room->id)->exists()){  
       throw ValidationException::withMessages(['message'=> 'This Room is already scheduled and cannot be deleted again!']);
    }

    $room->delete();
    return to_route ('rooms.index')->with('success','Room  Has Been deleted Successfully');


  

}
}