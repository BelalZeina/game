<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Requests\Api\ChangePassRequest;
use App\Http\Requests\Api\ForgetPassRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{


    public function register(RegisterRequest $request){
        $data = $request->except('password',  'img' ,);

            $data['password'] = bcrypt($request->password);
            $data['level'] = 1;
            if ($request->hasFile('img')) {
                $data['img'] = UploadImage($request->file('img'),"users");
            }
        $user = User::create($data);

        $token = $user->createToken('tokens')->plainTextToken;
        $data = [
            'user' => new UserResource($user),
            // 'token'  => $token
        ];

        return sendResponse(200, 'user created successfully',$data);
    }


    public function login(LoginRequest $request)
    {
            $user = User::where('phone' , $request->phone)->first();
            if ($user &&  Hash::check($request->password, $user->password)) {
                if($user->expire_at < now()){
                    return sendResponse(403 ,'your subscripe ended.');
                }
                $token = $user->createToken('token')->plainTextToken;

                $data = [
                    'user' => new UserResource($user),
                    'token'  => $token
                ];
                return sendResponse(200, 'user login successfully',$data);
            }
            return sendResponse(403 ,'Phone & Password does not match with our record.');

    }



    public function update_profile(UpdateUserRequest $request)
    {
        $user = User::find(auth()->user()->id);

        if ($user) {

            $data = $request->except('img');

            if ($request->hasFile('img') && $user->img) {
                Storage::delete($user->img);
                $data['img'] = UploadImage($request->file('img'),"users");

            } else {
                $data['img'] = $user->img;
            }

            $user->update($data);
            $token = $user->createToken('tokens')->plainTextToken;

            $data = [
                'user' => new UserResource($user),
                'token'  => $token
            ];

            return sendResponse( 200, 'user update successfully',$data);
        }
    }

    public function update_profile_image(Request $request)
    {
        $rules = [
            'img' => 'required|mimes:jpeg,png,jpg,gif', // Example validation rules for image
        ];
        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }
        $user = User::find( auth()->user()->id);

        if ($user) {

            $data = [];

            if ($request->hasFile('img')) {
                if($user->img){
                    Storage::delete($user->img);
                }
                $data['img'] = UploadImage($request->file('img'),"users");
            } else {
                $data['img'] = $user->img;
            }

            $user->update($data);
            return sendResponse(200, 'user image update successfully', new UserResource($user));
        }
    }


    public function get_profile()
    {

        $user = User::find(auth()->user()->id);
        if ($user) {
            return sendResponse(200, 'user found successfully',new UserResource($user));
        } else {
            return sendResponse(404, 'user not found');
        }
    }


    public function reset_password(ForgetPassRequest $request)
    {

        $user = User::find( auth()->user()->id);

        if ($user) {

            $user->update(['password' => bcrypt($request->password)]);
            return sendResponse(200, 'password update successfully',);
        } else {
            return sendResponse(404, 'user not found');
        }
    }

    public function change_Password(ChangePassRequest $request)
    {

        $user = auth()->user();

        if ($user) {

            if (Hash::check($request->old_password, $user->password) ){
                $user->update(['password' => bcrypt($request->password)]);

                $user = User::find(auth()->user()->id);
                $token = $user->createToken('token')->plainTextToken;

                $data = [
                    'user' => new UserResource($user),
                    'token'  => $token
                ];

                return sendResponse(200, __('api.change_password_success'), $data);
            } else {
                return sendResponse(422, __('api.old_password_not_found'), null);
            }
        } else {
            return sendResponse(404, __('api.token_not_found'), null);
        } // end of else user

    }

    public function delete_profile()
    {
        $user = User::find( auth()->user()->id);

        if ($user) {

            $user->delete();
            return sendResponse(200, 'account deleted successfully' );
        } else {
            return sendResponse(404, 'user not found ');
        }
    }

    public function logout(Request $request)
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
            return sendResponse(200, 'User logout successfully');
        } else {
            return sendResponse(400, 'User not authenticated');
        }
    }




}
