<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;


    protected $guarded = [];

     // get Size translation
     public function getSizeAttribute()
     {
         return $this->attributes['size_' . app()->getLocale()];
     } // end getSizeAttribute

    // get Color translation
    public function getColorAttribute()
    {
        return $this->attributes['color_' . app()->getLocale()];
    } // end getColorAttribute


    public function getDescAttribute()
    {
        return $this->attributes['desc_' . app()->getLocale()];
    } // end getDescAttribute

}
