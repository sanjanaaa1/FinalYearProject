<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;




class GoogleController extends Controller
{
  public function loginwithGoogle(){
    // dd('ok');
     return Socialite::driver('google')->redirect();

  }
  public function callbackfromGoogle(){

     try{

        $user = Socialite::driver('google')->user();

if (!$user->getEmail()) {
    echo"something went worng";
//     return redirect()->route('login')->withErrors(['error' => 'Oops! We could not retrieve your email address from Google. Please try again later.']);
 }
        // dd($user);
      $is_user = User::where('email',$user->getEmail())->first(); // here you are trying to get email of customer but its returning null
        // dd($is_user);
     if(!$is_user){
      $saveUser =   User::updateOrCreate(
            [
                'google_id'=>$user->getId()
            ],
            [
                'full_name'=> $user->getName(),
                'email'=>$user->getEmail(),
                'password'=>Hash::make($user->getName().'@'.$user->getId())
            ]
            );
     }
     else{
        $saveUser = User::where('email',$user->getEmail())->update([
            'google_id' => $user->getId(),
        ]);

     $saveUser = User::where('email',$user->getEmail())->first();

     }
    //   Auth::loginUsingId($saveUser->id);
         return redirect()->route('homePage');
         //return redirect()->intended($this->redirectPath());


     } catch( Throwable $eh){
         throw $eh;

    }
  }
}
