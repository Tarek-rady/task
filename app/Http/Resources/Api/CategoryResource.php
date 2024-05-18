<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id'   => $this->id ,
            'name' => $this->name ,
            'img'  => url('storage/' . $this->img) ,
        ];
    }
}
