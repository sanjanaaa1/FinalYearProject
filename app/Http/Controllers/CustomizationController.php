<?php

namespace App\Http\Controllers;

use App\Models\Customization;
use Illuminate\Http\Request;
use App\Models\Copper;
use App\Models\Brass;
use Auth;
class CustomizationController extends Controller
{
    public function index()
    {
        $copperProducts = Copper::all();
        
        $brassProducts = Brass::all();
        
        return view('fontend.customization', compact('copperProducts', 'brassProducts'));
    }

    public function submit(Request $request)
    {
        
        if (!auth()->check()) {
            return redirect()->route('customer-login')->with('message','You need  login in order to customize');
        } else{
    
        $data= $request->product_category;
        $data_id= $request->product_id;
        $user = Auth::user();
        $user_id = $user->id;
        // dd($user_id);

        //dd($data_id);
        if ($data == 'brass') {
         $title = Brass::where('id', $data_id)->value('title');
        $customization = new Customization();
        $customization->product_category = $request->input('product_category');
        $customization->title = $title;
        $customization->product_id = $request->input('product_id');
        $customization->size = $request->input('size');
        $customization->user_id = $user_id;
        $customization->special_instructions = $request->input('special_instructions');
        $customization->save();
         
        return redirect()->back()->with('success', 'Your customization request has been submitted successfully!');

        } elseif ($data == 'copper') {
            $title = Copper::where('id', $data_id)->value('title');
            $user = Auth::user();
            $user_id = $user->id;
            $customization = new Customization;
            $customization->product_category = $request->input('product_category');
            $customization->title = $title;
            $customization->product_id = $request->input('product_id');
            $customization->size = $request->input('size');
            $customization->special_instructions = $request->input('special_instructions');
            $customization->user_id = $user_id;
            $customization->save();
            return redirect()->route('product.customization')->with('success', 'Your customization request has been submitted successfully!');
            
        }
        return redirect()->route('product.customization')->with('error', 'Something went wrong!');

         
   }
}
    }