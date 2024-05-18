<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id ,
            'name' => $this->name ,
            'price' => $this->price ,
            'qty' => $this->qty ,
            'img' => url('storage/' . $this->img) ,
            'desc' => $this->desc ,

            'sizes'  => $this->sizes->map(function ($product){
                return [
                   'id' => $product->id ,
                   'size' => $product->size ,
                   'code_size' => $product->code_size ,
                ];
            }) ,


            'colors' => ColorResource::collection($this->colors) ,

            'images' => $this->images->map(function($product){
                return [
                'id' => $product->id ,
                'img' => url('storage/' . $product->img) ,
                ];
            })





        ];
    }
}
