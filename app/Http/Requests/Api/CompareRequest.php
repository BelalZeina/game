<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CompareRequest extends MasterApiRequest
{

    public function authorize(): bool
    {
        return true ;
    }


    public function rules(): array
    {
        return [

            'company_id1'  => 'required|exists:companies,id' ,
            'company_id2'  => 'required|exists:companies,id' ,
        ];
    }
}
