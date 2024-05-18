<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name_ar'    => 'required|max:255' ,
            'name_en'    => 'required|max:255' ,
            'price'      => 'required|numeric' ,
            'qty'        => 'required|numeric' ,
            'category_id'=> 'required' ,
            'desc_ar'    => 'required' ,
            'desc_en'    => 'required' ,
            'img'        => $this->method() == "POST" ? 'required|mimes:png,jpg,jpeg' : 'nullable|mimes:png,jpg,jpeg'
        ];
    }
}
