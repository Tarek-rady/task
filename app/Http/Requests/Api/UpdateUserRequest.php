<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'name'     => 'required' ,
            'email'    => 'required|unique:users,email,'.auth()->user()->id ,
            'phone'    => 'nullable|unique:users,phone,'.auth()->user()->id ,
            'img'      => 'nullable|mimes:png,jpg,jpeg' ,

        ];
    }
}
