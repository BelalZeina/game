<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'name'  => 'required|max:255' ,
            'email'  => 'required|email' ,
            'phone'  => 'required' ,
            'msg'  => 'required' ,

        ];
    }
}
