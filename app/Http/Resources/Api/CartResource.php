<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id ,
            'code' => $this->code ,
            'total' => $this->total ,
            'items' => ItemResource::collection($this->items)
        ];
    }
}
