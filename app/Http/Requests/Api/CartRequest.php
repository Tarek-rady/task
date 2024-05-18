<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'product_id' => 'required|exists:products,id' ,
            'qty'         => 'required' ,
        ];
    }
}
