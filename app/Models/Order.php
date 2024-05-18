<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $guarded = [];

    // function get user
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    // function get status
    public function status()
    {
        return $this->belongsTo(Status::class , 'status_id');
    }
    // function has many items
    public function items()
    {
        return $this->hasMany(Cart::class , 'order_id');
    }



}
