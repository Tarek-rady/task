<?php

namespace App\Services\Admin;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Repositories\Sql\UserRepository;
use Illuminate\Http\Request;

class UserService
{
    use HelperTrait;
    protected $userRepo ;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo    = $userRepo ;
    }

    public function get_users(){

        $users = $this->userRepo->query();

        return $this->columns($users);
    }

    public function columns($users){
        return DataTables($users)

        ->editColumn('created_at' , function($user){
            return $user->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.users.actions')

        ->rawColumns(['action'])
        ->make(true);
    }

    public function add_admin(Request $request , $data){
        $this->addImage($request, $data, 'img', 'users');
        $admin =$this->userRepo->create($data);
    }

    public function update_admin(Request $request , $data , $admin){
        $this->updateImg($request, $data, 'img', 'users' , $admin);
        $admin->update($data);
    }


}
