<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customization extends Model
{
    use HasFactory;

    protected $table='customization';

    public $fillable =[
       'product_category',
       'title',
       'size',
       'user_id',
       'special_instructions',

    ];
}
