<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use App\Repositories\Sql\AdminRepository;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(AdminRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showLoginForm()
    {

        return \view('dashboard.auth.login');
    }

    public function login(AuthRequest $request)
    {

        //attempt to log admin
        if (auth('admin')->attempt(['email' => $request->email, 'password' =>$request->password ])) {
            return \redirect()->intended(route('admin.home'))->with('success', 'تم تسجيل الدخول بنجاح');
        }else{
            return redirect()->back()->with('error', 'البريد الالكترونى او كلمة المرور غير صحيحة');
        }



    }

    public function logout(Request $request)
    {
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }






}
