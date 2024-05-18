<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id ,
            'name' => $this->name ,
            'price' => $this->price ,
            'qty' => $this->qty ,
            'desc' => $this->desc ,
            'img' => url('storage/' . $this->img) ,
            'viewer' => $this->viewer
        ];
    }
}
