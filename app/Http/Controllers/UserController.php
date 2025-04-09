<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('fontend.user.profile', compact('user'));
    }

    public function orders()
    {
        $user = Auth::user();
        
        // Adjust this query based on your actual Order model structure
        $orders = Order::where('user_id', $user->id)
                      ->orderBy('created_at', 'desc')
                      ->get();
        
        return view('fontend.user.orders', compact('orders'));
    }
}