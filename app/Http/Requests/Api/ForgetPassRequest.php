<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\MasterApiRequest;

class ForgetPassRequest extends MasterApiRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

            return [
                'password' => 'required|min:6|confirmed' ,
                'password_confirmation' => 'required_with:password|same:password|min:6' ,
            ];

    }
}
