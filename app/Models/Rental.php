<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table =('rentals');
    public $fillable = ['title', 'rental_duration', 'image' ,'total_price', 'category_name'];
            
}

