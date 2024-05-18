<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Sql\OrderRepository;
use App\Services\Admin\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class OrderController extends Controller
{
    protected $orderRepo , $orderService ;
    public function __construct(OrderRepository $orderRepo , OrderService $orderService)
    {
        $this->middleware('permission:orders-read')->only(['index']);
        $this->middleware('permission:orders-create')->only(['create', 'store']);
        $this->middleware('permission:orders-update')->only(['edit', 'update']);
        $this->middleware('permission:orders-delete')->only(['destroy']);
        $this->orderRepo = $orderRepo ;
        $this->orderService = $orderService ;

    }


    public function get_orders()
    {
        return $this->orderService->get_orders();
    }

    public function index()
    {

         return view('dashboard.backend.orders.index');
    }

    public function update_status(Request $request, $id)
    {

        $order = $this->orderRepo->findOne($id);
        $this->orderService->update_status($request , $order);

        return redirect(route('admin.orders.index'))->with('success', __('models.updated_successfully'));
    }

    public function show($id){
        $order = $this->orderRepo->findOne($id);
        return view('dashboard.backend.orders.show' , compact('order'));
    }









    public function destroy($id)
    {
         $admin = $this->orderRepo->findOne($id);

        if ($admin->img) {
            Storage::delete($admin->img);
        }

        $admin->delete();
        return redirect(route('admin.orders.index'))->with('success', __('models.deleted_successfully'));

    }
}
