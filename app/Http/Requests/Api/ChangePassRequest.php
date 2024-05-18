<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\MasterApiRequest;

class ChangePassRequest extends MasterApiRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

            return [
                'old_password' => 'required' ,
                'password' => 'required|min:6|confirmed' ,
                'password_confirmation' => 'required_with:password|same:password|min:6' ,
            ];

    }
}
