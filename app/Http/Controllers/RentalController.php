<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\User;
use Mail;

use Auth;

class RentalController extends Controller
{
     
    //  public function index(Request $request){
    //     return view('rentcheckout.create');
    //  }
     public function index(Request $request){
        $rent_data= $request->all();
         //dd($rent_data);
         return view ('rental',compact('rent_data'));
     }
     

     public function store(Request $request)
{
        try{
            if (!auth()->check()) {
                return redirect()->route('customer-login')->with('message','You need to log in to add products to your cart.');
            }
    // Handle file upload for image if present
    elseif ($request->hasFile('image')) {
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
    $userId = Auth::id();

    $isInserted = Rental::create([
        
        'title' => $request->input('title'),  // Make sure to capture title from the request
        'category_name' => $request->input('category_name'),
        'image' => $imagePath,
        'rental_duration' => $request->input('rental_duration'),
         'user_id' => $userId,
    ]);

    
    if ($isInserted) {
       // dd("success");
        // return redirect()->route('product.rent')->with('message', 'Inserted successfully');
        return back()->with('message', 'You will get notified once approved');
    } else {
       // dd("error");
        return back()->with('error', 'Something went wrong');
    }
}
catch (Exception $e) {
    //dd("eror");
    return redirect()->route('cart.index')->with('error', 'Something went wrong ' . $e->getMessage());
}

}



public function showRental(){
    $rent = Rental::all();
    //dd($rent);
    return view ('rent.detailsrental',compact('rent'));
    // return view('','data' =>$rent);
}

public function sendEmail(Request $request, $id)
{     
    //dd($request->all());
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }
    $email = $user->email;

    $order_cancel= $request->status;

    if($order_cancel == 'hold'){
        return back()->with ('message', 'update successful');
    }
    elseif ($order_cancel == 'deliver'){
        Mail::send('rent.rentemail', [], function ($message) use ($email) {
            $message->to($email); // Use the email directly
            $message->subject('Rented Successful');
        });
    
        return redirect()->back()->with('success', 'Rent status updated and notification sent successfully.');
    }
     elseif ($order_cancel == 'cancel'){
       // dd("hi");
        Mail::send('rent.cancelemail', [], function ($message) use ($email) {
            $message->to($email); // Use the email directly
            $message->subject('Request Cancel');
        });
    
        return redirect()->back()->with('success', 'Rent cancel notification sent successfully.');

     }
     else{
        return redirect()->back()->with('error', 'Something went wrong');

    }
   
}
public function rentCheck(Request $request){
 return view('rent.rentcheckout');

  }

  public function storeRental(Request $request){

    $data= $request->all();
    dd($data);

  }

}

