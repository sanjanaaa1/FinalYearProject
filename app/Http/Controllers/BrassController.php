<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brass;
use App\Models\Review;
use DB;


class BrassController extends Controller
{
    public function  index(){
        
       //dd("hi");
         $users = Brass::all();
         //dd($users);
           return view('brass',['users' => $users]);
    }
    public function show(){
        $mens = DB::table('brass')
        ->whereNotNull('image')
        ->get();

        return view('shoe_men_show',['mens' =>$mens]);
    }





    public function create(){
        return "Create Products";

    }

    public function store(Request $request) {
        // return "save Product";
        //dd($request);

        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'image' => 'required|max:2048',
            'category_name'=>'required',
            'Quantity' =>'required',
        ]);

        $men = $request->all();
        // $men= MenShoe::all();
        $imageArray = [];

        if (!empty($request->image)) {
            $i = 0;
            foreach ($request->image as $key => $value) {
                $name = str_replace(' ', '', $value->getClientOriginalName());
                $newName = time().'-'.$name;
                $value->storeAs('public/shoes/', $newName);
                $imageArray[$i++] = $newName;
            }
        }
        $img = (json_encode($imageArray));
        // echo "inserted successfully ";
        $isinserted = Brass::create([
            'title' =>  $men['name'],
            'price' => $men['price'],
            'category_name' => $men['category_name'],
            'image' => $img,
            'description' => $men['description'],
            'Quantity' =>$men['Quantity'],


        ]);
         if ($isinserted ){
            return redirect()->route('men.show')->with('message','Inserted succsssful');}
            else{
                return back()->with('error','something went wrong');
            }

    }



    public function destroy($id) {

        $user= DB::table('brass')
        ->where('id',$id)
        ->delete();

    return redirect()->route('men.show')->with('error','Deleted Successfully!!');
    }

   public function editdata($id){
   // dd($id);

   $posts = Brass::find($id);
   //dd($posts);
   return view('shoe_update',compact('posts'));

   }
   public function Update( Request $request,$id){
    $imageArray = [];

if (!empty($request->image)) {
    $i = 0;
    foreach ($request->image as $value) {
        $name = str_replace(' ', '', $value->getClientOriginalName());
        $newName = time().'-'.$name;
        $value->storeAs('public/shoes/', $newName);
        $imageArray[$i++] = $newName;
    }
}
$img = json_encode($imageArray);

$user = Brass::find($request->id);
$user->title = $request->name;
$user->price = $request->price;
$user->category_name = $request->category_name;
$user->image = $img;
$user->description = $request->description;
$user->save();

return redirect()->route('men.show')->with('message','product a updated successfull');

   }

   Public function shoeDisplay(){
    $dataArray=[];
    $shoeArray = [];

    $shoes = Brass::get();
    // foreach ($shoes as $key => $val) {
    //     $data = [];
    //     $data['shoe_id'] = $val->id;
    //     $data['category'] = $val->category_name;
    //     $data['title'] = $val->title;
    //     $data['price'] = 'Rs.'.$val->price.' /-';
    //     $image = json_decode($val->image);
    //     $data['image'] = asset('/storage/shoes/'.$image[0]);
    //     $shoeArray[] = $data;
    // }
    // $dataArray['shoes'] = $shoeArray;
    //dd($dataArray);

    return view('fontend.homeshoes', compact('shoes'));
}

 public function details(Request $request,$id){
    $datas= Brass::find($id);

    $reviews = Review::where('product_id',$id)->get();
      return view('more-details-shoe',compact('datas','reviews'));

 }

 public function searchFilter(Request $request){
    $query = $request->input('query');
    $datas = Brass::where('title', 'LIKE', "%{$query}%")->get();
   //dd($datas);
    return view('search-shoe', compact('datas',));
 }





}
