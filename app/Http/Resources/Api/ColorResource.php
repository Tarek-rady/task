<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id ,
            'color' => $this->color ,
            'code_color' => $this->code_color ,
        ];
    }
}
