<?php

namespace App\Services\Api;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Http\Resources\Api\UserResource;
use Illuminate\Http\Request;
use App\Repositories\Sql\UserRepository;
use Illuminate\Support\Str;
use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthService
{

    use HelperTrait , ApiResponseTrait;
    protected $userRepo ;

    public function __construct(UserRepository $userRepo)
    {
          $this->userRepo = $userRepo ;
    }



    public function register(Request $request , $data){
        $data['password'] = bcrypt($request->password);
        $this->addImage($request, $data, 'img', 'users');
        $data['email_verified_at'] =  now();
        $data['remember_token'] = Str::random(10);
        $user = $this->userRepo->create($data);
        return $this->userResource($user);
    }


    public function login(Request $request , $user){
        if ($user &&  Hash::check($request->password, $user->password)) {
           return $this->userResource($user);
        }else{
            return $this->ApiResponse(null ,'Email & Password does not match with our record.', 403);
        }
    }


    public function change_password(Request $request){
        $user = auth()->user();

        if ($user) {

            if (Hash::check($request->old_password, $user->password) ){
                $user->update(['password' => bcrypt($request->password)]);
                return $this->userResource($user);
            } else {
                return $this->ApiResponse(null, __('api.old_password_not_found'), 422);
            }
        } else {
            return $this->ApiResponse(null, __('api.token_not_found'), 404);
        } // end of else user
    }

    public function update_user(Request $request){
        $user = $this->userRepo->findWhere(['id' => auth()->user()->id]);
        if ($user) {
            $data = $request->except('img');
            $this->updateImg($request, $data, 'img', 'users' , $user);
            $user->update($data);
            return $this->userResource($user);
        }
    }


    public function get_user($user){
        if ($user) {
            return $this->ApiResponse(new UserResource($user), 'user found successfully', 200);
        } else {
            return $this->notFoundResponse();
        }
    }



    public function userResource($user) {
        $token = $user->createToken('tokens')->plainTextToken;
        $data = [
            'user' => new UserResource($user),
            'token'  => $token
        ];
        return $this->ApiResponse($data, 'data successfully', 200);
    }







}
