<?php
namespace App\Http\Controllers;

use App\Models\Roomcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RoomcategoryController extends Controller
{

    public function index() {

        $room_category= Roomcategory::query()->orderBy("id","desc")->get();
        return view('dashboard.room_category', ['categories' => $room_category]);
    }
    
    public function show(Roomcategory $category) {
        return view('dashboard.show_category', compact('category'));
    }
    public function store(Request $request){
        $request->validate([
            'category'=>['required','min:4','unique:room_categories,category'],
            'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'details'=>['required','min:20'],
            'wifi'=>['',''],
            'laundry'=>['',''],    
            'lunch'=>['',''],
            'breakfast'=>['',''],

        ]);
        

        $name = time().'.'.$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->move(public_path('/dist/img'), $name);
        
        $name=$request->file('image')->getClientOriginalName();
        $name= time().'.'. $name;
        Roomcategory::create([
            'category'=>$request->category,
            'image'=> $name,
            'details'=>$request->details,
            'wifi'=>$request->input('wifi'),
            'laundry'=>$request->input('laundry'),
            'lunch'=>$request->input('lunch'),
            'breakfast'=>$request->input('breakfast'),
            
        ]);
    
        return to_route ('room_category.index')->with('success','Room Category Has Been Created Successfully');

    
}



public function edit(Roomcategory $category) {
    return view('dashboard.edit_room_category',
     ['category' => $category]);

}

public function update(Roomcategory $category){
    $attributes = request()->validate([
        'category'=>['required','min:4','unique:room_categories,category']
    ]);
    $category->update($attributes);
    //$category->update(['category'=> $attributes['category']]); this too will work
    return to_route ('room_category.index')->with('success','Room Category Has Been updated Successfully');


}

public function destroy(Roomcategory $category){

    if(\DB::table('room_allocations')->where('category_id', $category->id)->exists()){  
        throw ValidationException::withMessages(['message'=> 'This room category is already scheduled and cannot be deleted again!']);
     }
 
        $category->delete();

    return to_route ('room_category.index')->with('success','Room Category Has Been deleted Successfully');


}
}