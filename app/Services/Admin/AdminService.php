<?php

namespace App\Services\Admin;

use App\Repositories\Sql\AdminRepository;
use App\Repositories\Sql\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Dashboard\HelperTrait;

class AdminService
{

    protected $adminRepo , $roleRepo;
    use HelperTrait;

    public function __construct(AdminRepository $adminRepo , RoleRepository $roleRepo)
    {
        $this->adminRepo    = $adminRepo ;
        $this->roleRepo     = $roleRepo ;
    }


    public function roles(){
      return $this->roleRepo->getAll();
    }

    public function get_admins(){

        $admins = $this->adminRepo->query();
        return $this->columns($admins);
    }

    public function columns($admins){
        return DataTables($admins)
        ->editColumn('roles', function ($admin) {
            return $admin->roles->map(function ($admin_roles) {
                return '<span class="badge rounded-pill bg-info">' . $admin_roles->name . '</span><br>';
            })->implode('');
        })
        ->editColumn('created_at' , function($admin){
            return $admin->created_at->format('y-m-d');
        })
        ->addColumn('action', 'dashboard.backend.admins.actions')
        ->rawColumns(['action' , 'roles'])
        ->make(true);
    }

    public function add_admin(Request $request , $data){
        $data['password'] = bcrypt($request->password) ;
        $data['email_verified_at'] =  now() ;
        $data['remember_token'] = Str::random(10) ;
        $this->addImage($request, $data, 'img', 'admins');
        $admin =$this->adminRepo->create($data);
        $this->add_role($request , $admin);

    }

    public function add_role($request , $admin){

        if($request->role_id){
            $admin->syncRoles(['admin' => $request->role_id]);
        }
    }

    public function update_admin(Request $request , $data , $admin){
        if(request()->has('password') && $request->password != null){
            $data['password'] = bcrypt($request->password);
        }
        $this->updateImg($request, $data, 'img', 'admins' , $admin);
        $admin->update($data);
        $this->add_role($request , $admin);

    }

    public function update_profile(Request $request , $data){
        $admin = auth()->user();

        if(request()->has('password') && $request->password != null){
            $request_data['password'] = bcrypt($request->password);
        }
        $this->updateImg($request, $data, 'img', 'admins' , $admin);
    }


}
