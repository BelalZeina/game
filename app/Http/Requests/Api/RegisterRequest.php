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
            'name'        => 'required' ,
            'phone'       => 'required|unique:users,phone|numeric' ,
            'password'    => 'required' ,
            'img'         => 'nullable|mimes:png,jpg,jpeg' ,
        ];
    }
}
