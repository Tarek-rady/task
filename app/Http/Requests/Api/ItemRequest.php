<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'item_id'  => 'required|exists:carts,id' ,

        ];
    }
}
