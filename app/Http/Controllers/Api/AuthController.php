<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\UserResource;
use App\Repositories\Sql\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Requests\Api\ChangePassRequest;
use App\Http\Requests\Api\ForgetPassRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Services\Api\AuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    use ApiResponseTrait ;
    protected $userRepo , $userService;

    public function __construct(UserRepository $userRepo , AuthService $userService)
    {
        $this->userRepo = $userRepo ;
        $this->userService = $userService ;
    }


    public function register(RegisterRequest $request){
        $data = $request->except('password', 'email_verified_at', 'remember_token' , 'img' );
       return $this->userService->register($request , $data);

    }



    public function login(LoginRequest $request)
    {
        $user = $this->userRepo->getWhere([ ['email' , $request->email]  , ['is_active' , 0 ]])->first();
        return $this->userService->login($request , $user);
    }


    public function update_profile(UpdateUserRequest $request)
    {
       return $this->userService->update_user($request);
    }


    public function get_profile()
    {
        $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
        return $this->userService->get_user($user);
    }


    public function reset_password(ForgetPassRequest $request)
    {
        $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
        $user->update(['password' => bcrypt($request->password)]);
        return $this->userService->get_user($user);
    }

    public function change_Password(ChangePassRequest $request)
    {
        return $this->userService->change_password($request);

    } // end of change password

    public function delete_profile()
    {
        $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
        $user->delete();
        if ($user) {

            return $this->ApiResponse(true, 'account deleted successfully', 200);
        } else {
            return $this->notFoundResponse();
        }
    }

    public function logout(Request $request)
    {

        $token =  $request->user()->tokens()->delete();
        return $this->ApiResponse(true, 'user logout successfully');
    }




}
