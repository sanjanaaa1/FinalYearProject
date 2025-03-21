<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    public function storeReview(Request $request, $id)
{
    if (!auth()->check()) {
        return redirect()->route('customer-login')->with('message','You need  login in order to comment.');
    } else{

        $request->validate([
            'comment'=>'required',

        ]);

    $name = Auth::user()->name;

    //dd($name);
    $review = new Review;
    $review->product_id = $request->input('product_id');
    $review->category_name = $request->input('category_name');
    $review->stars = $request->input('rating');
    $review->message = $request->input('comment');
    $review->name = $name;
    $review->save();

    //return "success";

    return redirect()->back()->with('success', 'Your review has been submitted.');
    }
}

public function show(){
$review= Review::all();
//dd($review);
return view('product-review',compact('review'));
}
}
