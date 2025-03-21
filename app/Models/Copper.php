<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copper extends Model
{
    use HasFactory;
    protected $table =('copper');
    public $fillable = ['title', 'image', 'price', 'description', 'category_name','Quantity'];

}
