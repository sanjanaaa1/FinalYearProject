<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brass extends Model
{
    use HasFactory;



    protected $table =('brass');
    public $fillable = ['title', 'image', 'price', 'description', 'category_name','Quantity'];




}
