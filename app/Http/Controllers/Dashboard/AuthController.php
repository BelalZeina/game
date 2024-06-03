<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Sql\AdminRepository;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $userRepository;



    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
                'phone' => 'required'  ,
                'password' => 'required'  ,
        ]);
        // Attempt to log in admin
        if (auth('admin')->attempt(['phone' => $request->phone, 'password' => $request->password ])) {
            return redirect()->intended(route('home'))->with('success', 'تم تسجيل الدخول بنجاح');
        }

        // Neither admin nor regular user authenticated
        return redirect()->back()->with('error', 'الهاتف او كلمة المرور غير صحيحة');
    }


    public function logout(Request $request)
    {
        auth('admin')->logout();
        return redirect()->route('login');
    }






}
