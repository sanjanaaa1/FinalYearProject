<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [

        'transaction_id',
        'payment_type',
        'status',
        'amount',
        'fee_amount' ,
        'user_name' ,
        'user_mobile',
        'merchant_name'  ,
        'email',
        'user_id',
    ];

    public function order()
{
    return $this->belongsTo(Order::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
