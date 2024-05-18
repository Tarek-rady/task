<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ImportRequest;
use App\Imports\UserImport;
use App\Jobs\ExportExcelFileUsers;
use App\Jobs\ImportExcelFileUsers;
use App\Repositories\Sql\UserRepository;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    protected $userRepo , $userService;

    public function __construct(UserRepository $userRepo , UserService $userService)
    {
        $this->middleware('permission:users-read')->only(['index']);
        $this->middleware('permission:users-create')->only(['create', 'store']);
        $this->middleware('permission:users-update')->only(['edit', 'update']);
        $this->middleware('permission:users-delete')->only(['destroy']);
        $this->userRepo = $userRepo ;
        $this->userService = $userService ;

    }


    public function get_users()
    {

        return $this->userService->get_users();

    }

    public function index()
    {
        return view('dashboard.backend.users.index');
    }



    public function export()
    {

        ExportExcelFileUsers::dispatch();

        return Excel::download(new UserExport, 'users.xlsx');
    }


    public function destroy($id)
    {
        $user = $this->userRepo->findOne($id);
        if ($user->img) {
            Storage::delete($user->img);
        }
        $user->delete();
        return redirect(route('admin.users.index'))->with('success', __('models.deleted_successfully'));
    }


    public function changeActiveUser(Request $request){
        $user = $this->userRepo->findOne($request->id);

        if($request->is_active == 1){
           $is_active = 1 ;
        }else{
            $is_active = 0 ;
        }
        $user->update([
            'is_active'    => $is_active
        ]);

        return response()->json(['success' => __('models.status_update')]);
    }

    public function show_import(){
        return view('dashboard.backend.users.import');
     }

     public function import(ImportRequest $request){
        $file = $request->file('file');
        if ($file) {
            
            $filePath = $file->store('imports');

            ImportExcelFileUsers::dispatch($filePath);
    
            return redirect(route('admin.users.index'))->with('success', __('models.added_successfully'));
        }
        return redirect(route('admin.users.index'))->with('error', __('models.file_not_found'));
    }
    



}
