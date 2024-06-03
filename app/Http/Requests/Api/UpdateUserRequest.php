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
            'phone'    => 'nullable' ,
            'img'      => 'nullable|mimes:png,jpg,jpeg' ,

        ];
    }
}
