<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use Mail;

class OrderController extends Controller
{
     public function index(Request $reques){
     return view('checkoutpage');
     }

    //  public function store(Request $request) {
    //    // dd($request->all());
    //     if (!auth()->check()) {
    //         return redirect()->route('customer-login')->with('error','You need to log in to add products to your cart.');
    //     } else {
    //         $user_id = Auth::user()->id;
    //        // dd($user_id);

    //          //Check if order exists
    //         if (Order::where('user_id', $user_id)->exists()) {
    //             //dd("hi");
    //             //return redirect()->route('orderform');

    //         $ticket_id = Str::random(6);
    //         //dd($ticket_id);

    //         $validatedData = $request->validate([
    //             'fullname' => 'required|string',
    //             'email' => 'required|email',
    //             'phone' => 'required|string',
    //             'address' => 'required|string',
    //             'city' => 'required|string',
    //             'state' => 'required|string',
    //             'zipcode' => 'required|string',
    //         ]);

    //         $validatedData['user_id'] = $user_id;
    //         $validatedData['ticket_id'] = $ticket_id;
    //         $order = Order::create($validatedData);
    //         //dd("success");

    //         return redirect()->route('checkou-order');
    //     }
    // }

public function store(Request $request) {
    if (!auth()->check()) {
        return redirect()->route('customer-login')->with('error', 'You need to log in to add products to your cart.');
    }

    $user_id = auth()->id();
    if (Order::where('user_id', $user_id)->exists()) {
        return redirect()->route('checkou-order')->with('error', 'You already have an order in progress.');
    }

    $ticket_id = Str::upper(Str::random(6));
    // Validate the request
    $validatedData = $request->validate([
        'fullname' => 'required|string',
        'email' => 'required|email',
        'phone' => 'required|string',
        'address' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'zipcode' => 'required|string',
    ]);
    $validatedData['user_id'] = $user_id;
    $validatedData['ticket_id'] = $ticket_id;

    // Create the order
    $order = Order::create($validatedData);

    return redirect()->route('checkou-order')->with('success', 'Order placed successfully.');
}





    public function orderForm(Request $request)
{
    if (!auth()->check()) {
        return redirect()->route('customer-login')->with('error','You need to log in to add products to your cart.');
    }
    else{


    $user_id = Auth::user()->id;
    $user_order = Order::where('user_id', $user_id)->first();
    $cartItems = Cart::where('user_id', auth()->id())->get();
    return view('order-form', ['user_order' => $user_order, 'cartItems' => $cartItems]);
    }
}


public function generatePDF(Request $request)
{
    $user_id = Auth::user()->id;
    $user_order = Order::where('user_id', $user_id)->first();
    $cartItems = Cart::where('user_id', auth()->id())->get();
    // return view('invoice', ['user_order' => $user_order, 'cartItems' => $cartItems]);

    $pdf = Pdf::loadView('invoice', ['user_order' => $user_order, 'cartItems' => $cartItems]);
    return $pdf->download('invoice.pdf');


}

public function details(Request $request){

 // dd('jy');
    // $user_order = Order::leftJoin('payments', 'orders.user_id', '=', 'payments.user_id')
    //  ->select('orders.*', 'payments.status')
    //  ->get();
    // // dd("hy");
    // back up code use this if you get an error at the end!
    $user_order = Order::all();

return view('order-details', compact('user_order'));

}

public function notify(Request $request, $id)
{
    $order = Order::find($id);
    $data = $order->pluck('email')->first();

    $user_id=$order->user_id;
    Cart::where('user_id', $user_id)->delete();

    Mail::send('purchase-success', [], function ($message) use ($data) {
        $message->to($data);
        $message->subject('Payment Succesfull');
    });

    return redirect()->back()->with('success', 'Order status updated and notification sent successfully.');
}



}
