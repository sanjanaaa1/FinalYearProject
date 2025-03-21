<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart_product';

    protected $fillable = [
        'user_id',
          'title',
        'product_id_shoe',
        'product_id_hoodie',
        'quantity',
        'price',
        'category_name',
        'image',
       'cartTotal',
    ];

    public function copper_Thing()
    {
        return $this->belongsTo(Copper::class, 'product_id_copper');
    }

    public function brass_Thing()
    {
        return $this->belongsTo(Brass::class, 'product_id_brass');
    }
}



