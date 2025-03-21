<?php
namespace App\Http\Controllers;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Mail;
use DB;
use Hash;
use Auth;
use validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;



class ForgotPasswordController extends Controller
{
     public function  forgetpasswordload(){
        return view('forget-password');
     }

     public function forgetpassword(Request $request){
       try{

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

          Mail::send('forgetPasswordMail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });

          return back()->with('message', 'We have e-mailed your password reset link!');

       }
       // throwing erro in font in side
       catch(Exception $e){
          return back()->with('error',$e->getMessage());
       }
     }
     //public function resetpasswordload(Request $request){
    //     // getting token  number from the link
    //     // also checking if  users mixed the url or there is missing letter in url of the reset link
    //         $resetData =  PasswordReset::where('token',$request->token)->get();
    //         if(isset($request->token) && count($resetData) > 0) {
    //             $data['customerId'] = $request->id;
    //             $data['customerEmail'] = $resetData[0]['email'];
    //             return view('resetPassword', $data);
    //         }

    //     else{
    //         return view('404');
    public function showResetPasswordForm($token) {
        try{
            return view('resetPassword', ['token' => $token]);

        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage());
         }

        }


//     public function reset(Request $request) {
//         //dd($request->all());

//     //     $request->validate([

//     //         'password'=>'required|string|min:8|confirmed'


//     $request->validate([
//         'email' => 'required|email|exists:users',
//         'password' => 'required|string|min:6|confirmed',
//         'password_confirmation' => 'required'
//     ]);
//     $user = User::where('email', $request->email)->first();
//     if ($user && Hash::check($request->password, $user->password))
//     {
//             return back()->with('error','YOu can not use same password again');
//     $updatePassword = DB::table('password_resets')
//                         ->where([
//                           'email' => $request->email,
//                           'token' => $request->token
//                         ])
//                         ->first();

//     if(!$updatePassword){
//         return back()->withInput()->with('error', ' Some thing went wrong please try again!');
//     }

//          //dd("heeloo");
//             //return redirect()->back()->with('error', 'Your current password can be used as a new password');
//         }
//         else{

//       $user = User::where('email', $request->email)
//                 ->update(['password' => Hash::make($request->password)]);


//       // dd("success");
//     return redirect()->back()->with('message', 'Your password has been changed!');
//     //echo "your password had been chagne";
// }

//     }


public function reset(Request $request) {
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required',
        'token' => 'required'
    ]);
    $updatePassword = DB::table('password_resets')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])
        ->first();

    if (!$updatePassword) {
        return back()->with('error', 'Invalid or expired token. Please request a new one.');
    }
    $user = User::where('email', $request->email)->first();
    if (Hash::check($request->password, $user->password)) {
        return back()->with('error', 'You cannot use the same password again.');
    }

    $user->update(['password' => Hash::make($request->password)]);
    DB::table('password_resets')->where('email', $request->email)->delete();

    return redirect()->back()->with('message', 'Your password has been changed!');
}

}