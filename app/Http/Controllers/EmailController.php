<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;
use DB;

class EmailController extends Controller
{
    public function store(Request $request){
        // $request->validate([
        //     'email'=>'required',
        // ]);
        $posts = new Email;
        $posts->email= $request->get('email');
        $posts->save();
        return redirect()->back()->with('success','Thank YOu will get notification onwards');


    }

    // public function massEmail(){
    //     $users = DB::table('users')
    //     ->whereNotNull('number')
    //     ->where('is_admin', '!=', 1)
    //      ->pluck('email');

    // }
}
