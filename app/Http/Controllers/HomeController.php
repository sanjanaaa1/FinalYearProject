<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Copper;
use App\Models\Brass;
use App\Models\NewsBlog;
use App\Models\Cart;

class HomeController extends Controller
{
    public function homepage(){
        //$cart = Cart::where('user_id', auth()->user()->id)->first();

        $hoodies = Copper::get();
        $shoes = Brass::get();
        $newsblogs = NewsBlog::get();
        return view('fontend.homepage', compact('hoodies', 'shoes', 'newsblogs',));
    }
    public function about(){
        return view('fontend.aboutus');
    }
    public function chartDisplay(){
               return view('chartjs');
    }
    // public function show( Request $request ,$id){
    //    $data= MenHoddie::all();
    //     dd($data);

    // }

    public function noPage(){
        //dd("hy");
        return view('404');
    }

}

