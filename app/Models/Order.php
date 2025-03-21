<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected  $fillable = [
        'fullname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'payment',
        'payment_status',
        'cash_payment',
        'zipcode',
        'user_id',
        'ticket_id',
    ];



    public function payments()
    {
        return $this->hasMany('App\Models\Payment');
    }
}
