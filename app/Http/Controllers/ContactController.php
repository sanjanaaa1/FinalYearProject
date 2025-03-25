<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\CustomerContact;


class ContactController extends Controller
{
    public function index(Request $request, $id){
        $post =  CustomerContact::find($id);
        //dd($post);
        return view('Contactform',compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // 'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->back()
                         ->with(['success' => ' You have replied successfull']);
    }

    // public function bulkEmail(){
    //       return view ('bulkemail-form');
    // }




 }
