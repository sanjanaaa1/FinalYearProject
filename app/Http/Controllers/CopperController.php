<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Copper;
use App\Models\Review;
use DB;

class CopperController extends Controller
{
     public function index(){
        return view('copper');
     }

     public function store(Request $request) {
        // return "save Product";

        //dd($request);
        $data = $request->all();

        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'image' => 'required|max:2048',
            // 'image'=>'required|mimes:jpeg,png,jpg,gif', 'max:2048',
            // image'=>'required'|'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048',
            'category_name'=>'required|string',
            'Quantity' =>'required|numeric',
        ]);



        $imageArray = [];
        $name = $data['image']->getClientOriginalName();
        $newName = time().$name;
        $data['image']->storeAs('public/hoodies/', $newName);
        $imageArray = $newName;
        $img = $imageArray;
        // dd($img);
        //echo "inserted successfully";
        $isinserted = Copper::create([
            'title' =>  $data['name'],
            'price' => $data['price'],
            'category_name' => $data['category_name'],
            'image' => $img,
            'description' => $data['description'],
            'Quantity' =>$data['Quantity'],


        ]);
         if ($isinserted ){
            return redirect()->route('hoodie-data')->with('message','Inserted succsssful');}
            else{
                return back()->with('error','something went wrong');
            }

    }
    public function show(){
        $data = DB::table('copper')
        ->whereNotNull('image')
      ->get();
    
        return view('hoodie-show', compact('data'));

     
    }

    public function destroy($id) {
        $user= DB::table('copper')
        ->where('id',$id)
        ->delete();
    return redirect()->route('hoodie-data')->with('error','Deleted Successfully!!');
    }


     public function showHooide(){
        $hoodies = Copper::get();
        //dd($hoodies);

        return view('fontend.homehoodies', compact('hoodies'));

     }
      public function showProduct( Request $request,$id){
        //dd($id);
       $datas= Copper::find($id);
       $reviews = Review::where('product_id', $id)->get();
       //dd($reviews);
      // dd($data);
        return view('more-detail-hoodies',compact('datas','reviews'));

     }

     public function search(Request $request)
     {
         $query = $request->input('query');
         $datas = Copper::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($query) . '%'])->get();

         return view('search-hoodie', compact('datas'));
     }


     public function editHooide(Request $request,$id){
             $data = Copper::find($id);
             //dd($data);

              return view("hoodie_update",compact('data'));
     }
     public function hoodieUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|max:2048',
        'category_name' => 'required|string',
        'Quantity' => 'required|numeric',
    ]);

    $menHoodie = Copper::find($id);

    if ($menHoodie) {
        if ($request->hasFile('image')) {
            $file = $request->file('image')[0];
            $name = $file->getClientOriginalName();
            $newName = time() . $name;
            $file->storeAs('public/hoodies/', $newName);
            $menHoodie->image = $newName;
        }

        $menHoodie->title = $request->input('name');
        $menHoodie->price = $request->input('price');
        $menHoodie->category_name = $request->input('category_name');
        $menHoodie->description = $request->input('description');
        $menHoodie->Quantity = $request->input('Quantity');

        $isUpdated = $menHoodie->save();

        if ($isUpdated) {


            //dd("success");
            return redirect()->route('hoodie-data')->with('success', 'Hoodie updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update the hoodie.');
        }
    }

    return redirect()->back()->with('error', 'Hoodie not found.');
}

   public function ushoiw(){
    
   }




}


