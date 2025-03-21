<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
     public function index(){
         return view('Rental');
     }
}
