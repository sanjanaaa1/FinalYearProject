<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
     public function index(Request $request){
        $rent_data= $request->all();
         //dd($rent_data);
         return view ('rental',compact('rent_data'));
     }

     public function store(Request $request)
{
    //dd($request->all());

    // Validation for incoming request
    //        $request->validate([
    //     'rental_duration' => 'required|numeric',
    //     'image' => 'nullable|image|',  // Ensure it's an image and limit size to 2MB max:2048
    //     'category_name' => 'required|string',
    //     'Quantity' => 'required|numeric',
    // ]);
   // dd("hi");

    // Handle file upload for image if present
    if ($request->hasFile('image')) {
       // dd("hi");
        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $newName = time() . $name;
        $image->storeAs('public/citizens/', $newName);  // Store the image in the specified folder
        $imagePath = $newName;
    } else {
        //dd("hi");
        $imagePath = null;  // Set image to null if no image is uploaded
    }

    // Insert the data into the database
    $isInserted = Rental::create([
        
        'product_title' => $request('title'),  // Make sure to capture title from the request
        'category_name' => $request->input('category_name'),
        'image' => $imagePath,
        'rental_duration' => $request->input('rental_duration'),
    ]);

    
    if ($isInserted) {
        dd("success");
       // return redirect()->route('product.rent')->with('message', 'Inserted successfully');
    } else {
        //dd("error");
        return back()->with('error', 'Something went wrong');
    }
}

}
