<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerContact;

use DB;

class CustomerContactController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',

        ]);
        // $post = $request->all();
        $post= new CustomerContact;
        $post->name = $request->get('name');
        $post->email = $request->get('email');
        $post->subject = $request->get('subject');
        $post->message = $request->get('message');
        $post->save();


     if(!$post){
         return back()->with('message','Some thing went wrong');

      }
      else{
         // echo "register successfull";
         return back()->with('success','Thank you we will contact you soon!!!!!');


    }
}
public function display(){
    //dd("hi");
    $datas= DB:: table('customer_contact')
    ->get();
    return view('show_contactus-detail',['datas'=>$datas]);

}
public function Fucked()
{
    dd("hi");
    $contacts = CustomerContact::all();
    dd($contacts);

    foreach ($contacts as $contact) {
        Mail::to($contact->email)->send(new ContactMail($contact));
    }
}
}
