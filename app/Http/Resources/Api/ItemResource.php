<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'item_id'  => $this->id ,
            'product' => new ProductResource($this->product) ,
            'qty'      => $this->qty ,
            'price'    => $this->price ,
            'total'    => $this->total ,
        ];
    }
}
