<?php

namespace App\Http\Requests;

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
            
            'name_ar'  => 'required|max:255' ,
            'name_en'  => 'required|max:255' ,
            'img'     => $this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg'

        ];
    }
}
