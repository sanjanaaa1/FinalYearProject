<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Auth;
use DB;

class PaymentController extends Controller


{
    public function verifyPayment(Request $request)
{
    $token = $request->token;

    $args = http_build_query(array(
        'token' => $token,
        'amount'  => 1000
    ));

    $url = "https://khalti.com/api/v2/payment/verify/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $secret_key = 'test_secret_key_9ec952fdf49f4f4e860dc33c7cee0bed';

    $headers = ["Authorization: Key $secret_key"];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Response
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $response;
}

public function storePayment(Request $request)
{
    //dd('hi');
        $response = $request->response;

        $data = json_decode($response, true);

        $transaction_id = isset($data['idx']) ? $data['idx'] : null;
        $payment_type = isset($data['type']['name']) ? $data['type']['name'] : null;
        $status = isset($data['state']['name']) ? $data['state']['name'] : null;
        $amount = isset($data['amount']) ? $data['amount'] : null;
        $fee_amount = isset($data['fee_amount']) ? $data['fee_amount'] : null;

        $user_info = isset($data['user']['name']) ? explode("(", $data['user']['name']) : null;
        $user_name = isset($user_info[0]) && $user_info[0] !== null ? $user_info[0] : null;
        $user_mobile = isset($user_info[1]) ? rtrim($user_info[1], ")") : null;

        $merchant_name = isset($data['merchant']['name']) ? $data['merchant']['name'] : null;
        $merchant_mobile = isset($data['merchant']['mobile']) ? $data['merchant']['mobile'] : null;
        // dd('hi');


        // DB::table('orders')
        // ->where('user_id', $user_id)
        // ->update(['order_status' => $status]);
        // dd($payment);
        return response()->json([
            'success' => true,
            'message' => 'Payment stored successfully',
            'redirect' => route('payment.message')
        ]);

    //  $user_id = Auth::user()->id;
    //  $order = Order::where('user_id', $user_id)->first();
    //  $email = $order->email;
    // $user_email = $order->user->email;

            // // Compose the email message
            // $message = "Dear {$order->user->name},\n\n";
            // $message .= "Thank you for your order. Your order with the following details has been confirmed:\n\n";
            // $message .= "Order ID: {$order->id}\n";
            // $message .= "Order Date: {$order->created_at}\n";
            // $message .= "Total Amount: {$order->total_amount}\n\n";
            // $message .= "We appreciate your business and hope to serve you again soon.";

            // // Send the email
            // Mail::raw($message, function ($message) use ($user_email) {
            //     $message->to($user_email)->subject('Order Confirmation');
            // });



}

    //

    public function PaymentDetails(){
       $payments = Payment::all();
       //dd($payments);

       return view('payment-details',compact('payments'));
    }

    public function index(){

        // DB::table('orders')->update(['order_status' => 'cash']);PP
        return view('Thankyou');
    }
    public function cashIndex(){

         DB::table('orders')->update(['cash_payment' => 'cash']);
         //dd("success");
         return view('CashThankYou');


    }

}


