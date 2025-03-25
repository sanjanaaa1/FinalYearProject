<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Exception;
use Validator;
use Auth;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    // admin login
    public function login()
    {
        return view('auth.login');
    }
    public function display(Request $request){
        return view('customer-login');

    }

    public function index(){
 return view('customer');
    }

    public function store(Request $request){
         // $post = $request->all();
         $request->validate([
             'name'=>'required',
             'email'=>'required|unique:users,email',
             'number'=>'required|digits:10|unique:users,number',
             
             
             'confirm_password'=>'required',
            //   'g-recaptcha-response' => 'required|captcha',


        ]);
        $verify =0;
        $customer= new User;
        $customer->name=$request->get('name');
        $customer->number=$request->get('number');
        $customer->email=$request->get('email');
        $customer->password=Hash::make($request->get('password'));
        $customer->verify =$verify;

        $customer->save();


        if(!$customer){
           return back()->with('message','Some thing went wrong');

        }
        else{
           // echo "register successfull";
           Mail::send('verify-form', ['customer' => $customer], function ($message) use ($customer) {
            $message->to($customer->email);
            $message->subject('Verify Email');



        });
       // dd("success");
           return back()->with('success','Please verify account to login');


        }



    }
    public function userLogin(Request $request){
        //dd($request->all());
      $request->validate([

        'email'=>'required',
        'password'=>'required',
      ]);
        $userCredentials = $request->only('email', 'password');
        if (Auth::attempt($userCredentials)) {
            $user = Auth::user();
            if ($user->is_admin == 1) {
                Session::put('userid', $user->id);
                Session::save();
                return redirect()->route('admin.dashboard')->with('message', 'You are not authorized to access this page');
            } elseif ($user->verify == 1) {
                session(['customerid' => $user->id]);
                session()->save();
                Session::put('customerid', $user->id);
                Session::save();
                return redirect()->route('homePage')->with('message', 'Login successful');
            } else {

                return redirect()->back()->with('message', 'Your account has been suspended');
            }
        } else {
            //dd("eeror");
            return redirect()->back()->with('message', 'Invalid login credentials. Please try again.');
        }
    }


    public function show(){
        // $users = DB::table('users')
        //                 ->whereNotNull('number')
        //               ->get();
                      //dd($users)
       // $users = DB::select('select * from cutomer');

    //    $users= DB:table(users)->where('is_admin' == 1)->get();
    $users = DB::table('users')->where('is_admin', '!=', 1)->get();
   




       return view('details-customer',['users'=>$users]);
     }



    // dashboard
    public function dashboard(Request $request)
    {
        return view('backend.dashboard');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

       // echo " You are logged out!!!!";
        return redirect()->route('admin.login');
    }


    public function userLogout(){
        Session::flush();
        Auth::logout();
         return redirect()->route('customer-login');


    }

    public function userProfile(){

        return view('userlogin');
    }


    public function password(Request $request){
        return view('Change-password');
    }


    public function changepassword(Request $request){

        $request->validate([
        'oldpassword'=>'required',
       'current_password'=>'required_with:confirm_password|different:oldpassword|same:confirm_password',
       'confirm_password'=>'required'
        ]);

        //dd( $userid = Session::get('userid'));
         $userid = session()->get('userid');

       $user = User::where('id', $userid)->select('password')->first();

       //dd($hashPassword);
        if (Hash::check($request->oldpassword ,$user->password)) {
           $user = User::find($userid);
             $user->password = Hash::make($request->current_password);
             $user->save();

             return  redirect()->route('customer-login')->with('status','Password changed Sucessfully!!');
        }

     else{
       // echo"wrong";
        return back()->with('error','old password does not match');

     }
    }

    public function userpassword(){
       return view('user-change-password');
    }



//      public function userChangepassword(Request $request){
//        $request->validate([
// 'oldpassword'=>'required',
// 'current_password'=>'required|confirmed',
// 'confirm_password'=>'required'

//        ]);
//         $customerid = session()->get('customerid');
//      //dd($customerid);
//      $user = User::where('id', $customerid)->select('password')->first();
//      //dd($user);
//       if (Hash::check($request->oldpassword ,$user->password)) {
//          $user = User::find($customerid);
//            $user->password = Hash::make($request->current_password);
//            $user->save();
//       }
//     }

 public function displayerror(){
      return view('404');
 }




 public function Verify($id)
 {
     $user = User::find($id);
    // dd($user);

     if (!$user) {
         abort(404);
     }

     $user->update(['verify' => 1]);

     $verified = true;

     return  view('verifyaccount')->with('message','Your account has been verified');
 }

 public function toggleVerify($id)
 {
     $user = User::find($id);

     if (!$user) {
         abort(404);
     }

     $user->update(['verify' => !$user->verify]);

     return redirect()->back()->with('message','account updated');
 }




    public function UserChangePassword(Request $request){
        $request->validate([
            'oldpassword' => 'required',
            'current_password' => 'required_with:confirm_password|different:oldpassword|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $customerid = session()->get('customerid');
       // dd($customerid);
        $user = User::where('id', $customerid)->select('password')->first();

        if (Hash::check($request->oldpassword, $user->password)) {
            $user = User::find($customerid);
            $user->password = Hash::make($request->current_password);
            $user->save();
            return back()->with('status', 'Password changed Successfully!!');
        } else {
            return back()->with('error', 'Old password does not match.');
        }
    }
    public function editProfile(Request $request){     
        $user_id = Auth::id(); // Get the authenticated user ID

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user_id,
        'number' => 'required|string|max:20',
    ]);

  $order=  User::where('id', $user_id)->update([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'number' => $validatedData['number'],
    ]);
        
        
        if ($order) {
            //dd('Success');  
            return back()->with('message', 'Profile edited Successfully!!');
        } else {
            return back()->with('error', 'Something went!!');
        }
        
        
       
    }



}
   //


