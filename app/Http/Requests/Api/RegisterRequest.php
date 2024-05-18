<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'name'     => 'required' ,
            'email'    => 'required|unique:users,email' ,
            'password' => 'required' ,
            'phone'    => 'nullable|unique:users,phone' ,
            'img'      => 'nullable|mimes:png,jpg,jpeg' ,
        ];
    }
}
