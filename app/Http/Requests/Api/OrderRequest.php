<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'address'  => 'required' ,

        ];
    }
}
