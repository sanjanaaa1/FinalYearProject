<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Hash;
 use Validator;
use DB;
use Auth;
use Session;

class CustomerController extends Controller
{
    public function index(){
        return view('customer');
     }

     public function display(){
        return view('customer-login');
     }
    public function store(Request $request){

        // $post = $request->all();
        $request->validate([
         'full_name'=>'required',
         'email'=>'required|unique:user,email',
         'number'=>'required|digits:10|unique:cutomer,number',
         'password'=>'required_with:confirm_password|same:confirm_password',
         'confirm_password'=>'required',
         'g-recaptcha-response' => 'required|captcha',


     ]);
     $customer= new Customer;
     $customer->full_name=$request->get('full_name');
     $customer->number=$request->get('number');
     $customer->email=$request->get('email');
     $customer->password=Hash::make($request->get('password'));

     $customer->save();

     if(!$customer){
        return back()->with('message','Some thing went wrong');

     }
     else{
        // echo "register successfull";
        return back()->with('success','You successfully registered');


     }

}

public function show(){
     $users = DB::table('cutomer')
                     ->whereNotNull('number')
                   ->get();
    // $users = DB::select('select * from cutomer');



    return view('details-customer',['users'=>$users]);
  }

  public function check(Request $request)
  {
        $validate = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required'
        ], [
            'email.required' => 'Please enter eamil address.',
            'email.email' => 'Please enter valid email address.',
            'password.required' => 'Please enter password.'
        ]);

        if ($validate->fails()) {
           // dd($validate->errors());
            return back()->withErrors($validate);
        }
        $post =$request->all();

        $customer = DB::table('cutomer')->select('id', 'full_name', 'email', 'password')->where('email', $post['email'])->first();
        if (!empty($customer) && Hash::check($post['password'], $customer->password)) {
            session(['user_id' => $customer->id]);
            session(['user_name' => $customer->full_name]);
            session(['user_email' => $customer->email]);
            session()->save();
            return redirect()->route('user-page')->with('message','login successful');
        } else {
            //dd('hsdv');
            return back()->with('error','credintals does not match our records');

        }
        //   if (Auth::guard('cutomer')->attempt($credentials)) {

        //     dd("right");
        // //     // return ok;
        // //     return redirect()->route('user-page')->with('message','login successful');
        //   }
        //   else{
        //     // echo 'credintals does not match our records';
        //     dd("wrong");
        //     // return back()->with('error','credintals does not match our records');
        //   }

  }
  public function UserLand(){
    return view('userlogin');
  }

  public function log(){
    // session flush;
    Session::flush();
    echo "log out";
  }

  public function product()
  {
    return view("fontend.product");
  }

  public function contactus()
  {
    return view("fontend.contactus");
  }

  public function ChangePassword(){
    return view('user-change-password');

  }
  public function UpdatePassword(Request $request){
    $request->validate([
        'oldpassword'=>'required',
       'current_password'=>'required_with:confirm_password|same:confirm_password',
       'confirm_password'=>'required'
        ]);




        //dd( $userid = Session::get('userid'));
         $userid = session()->get('userid');
       $user = Customer::where('id', $userid)->select('password')->first();

        if (Hash::check($request->oldpassword ,$user->password)) {
           $user = Customer::find($userid);
           //dd($user);
             $user->password = Hash::make($request->current_password);
             $user->save();
             //echo "hhh";

              return back()->with('status','Password changed Sucessfully!!');
        }

     else{
       // echo"wrong";
        return back()->with('error','old password does not match');

     }

  }



}
