<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded = [];

    // get Name translation
    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    } // end getNameAttribute

    // get Desc translation
    public function getDescAttribute()
    {
        return $this->attributes['desc_' . app()->getLocale()];
    } // end getDescAttribute

    public function category(){
       return $this->belongsTo(Category::class , 'category_id');
    }

    public function items(){
        return $this->hasMany(Cart::class , 'product_id');
    }

    public function images(){
        return $this->hasMany(ProductDetails::class , 'product_id')->where('type' , 'img');
    }

    public function sizes(){
        return $this->hasMany(ProductDetails::class , 'product_id')->where('type' , 'size');
    }

    public function colors(){
        return $this->hasMany(ProductDetails::class , 'product_id')->where('type' , 'color');
    }
}
