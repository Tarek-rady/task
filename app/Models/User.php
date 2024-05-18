<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory, Notifiable, HasApiTokens;


    protected $guarded = [] ;


    public function cart(){
        return $this->hasOne(Order::class , 'user_id')->where('type' , 'cart');
    }

    public function orders(){
         return $this->hasMany(Order::class , 'user_id')->where('type' , 'order');
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];



    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
