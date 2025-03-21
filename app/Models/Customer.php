<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    use HasFactory;
    protected $table='cutomer';
     protected $fillable=[
            'full_name',
           'email',
           'number',
           'password',
           'google_id',
     ];
     protected $hidden=[
    'remember_token',
     ];

    //  public static function boot() {

    //     parent::boot();

    //     static::created(function ($item) {

    //         $adminEmail = "outfitanil@gmail.com";
    //         Mail::to($email)->send(new ContactMail($item));
    //     });
    // }
}
