<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'code'  => 'required|exists:orders,code' ,


        ];
    }
}
