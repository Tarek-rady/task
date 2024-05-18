<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [
            'name'     => 'required|max:255' ,
            'email'    =>$this->method() == "POST" ? 'required|email|unique:users,email' : 'required|email|unique:users,email,'.$this->id ,
            'phone'    =>$this->method() == "POST" ? 'required|unique:users,phone' : 'required|unique:users,phone,'.$this->id ,
            'password' =>$this->method() == "POST" ? 'required' : 'nullable' ,
            'img'      =>$this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
