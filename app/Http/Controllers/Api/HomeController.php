<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{



    ///////////////////////////////////////////////////////////////////////////////////
    public function contact_us(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [

            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'msg' => 'required',
        ]);

        // If validation fails, return the validation errors
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new contact us entry
        $contactUs = Contact::create($request->all());

        // Return a success response
        return response()->json(['message' => 'Contact us entry created successfully', 'data' => $contactUs], 201);
    }
}
