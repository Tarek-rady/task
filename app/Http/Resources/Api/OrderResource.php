<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id'             => $this->id ,
            'user'           => new UserResource($this->user) ,
            'status'         => $this->status->name ,
            'address'        => $this->address ,
            'code'           => $this->code ,

            'payment_method' => $this->payment_method ,
            'date_order'     =>date('D, d M Y - h:ia', strtotime($this->date_order))   ,
            'items'          => ItemResource::collection($this->items) ,
            'cost'           => $this->cost ,
            'shipping_tax'   => $this->shipping_tax,
            'total'          => $this->total  ,

        ];
    }
}

