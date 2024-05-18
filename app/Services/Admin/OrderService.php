<?php

namespace App\Services\Admin;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Repositories\Sql\OrderRepository;
use App\Repositories\Sql\ProductRepository;
use Illuminate\Http\Request;

class OrderService
{
    use HelperTrait;
    protected $orderRepo , $productRepo;

    public function __construct(OrderRepository $orderRepo , ProductRepository $productRepo )
    {
        $this->orderRepo    = $orderRepo ;
        $this->productRepo    = $productRepo ;
    }

    public function get_orders(){

        $orders = $this->orderRepo->query();
        return $this->columns($orders);
    }

    public function columns($orders){
        return DataTables($orders)
        ->filterColumn('status', function ($query, $keyword) {
            $query->whereRelation('status', 'id', $keyword);
        })

        ->editColumn('user', function ($order) {
            return $order->user->name;
        })

        ->editColumn('date_order', function ($order) {
            return date('D, d M Y - h:ia', strtotime($order->date_order));
        })

        ->editColumn('status', function ($order) {
            if ($order->status_id == 1 || $order->status_id == 2 || $order->status_id == 3) {
                return '<span class="badge bg-warning-subtle text-warning text-uppercase">' . $order->status->name . '</span>';
            } elseif ($order->status_id == 2 || $order->status_id == 3) {
                return '<span class="badge bg-info-subtle text-info text-uppercase">' . $order->status->name . '</span>';
            } elseif ($order->status_id == 4 || $order->status_id == 5) {
                return '<span class="badge bg-primary-subtle text-primary text-uppercase">' . $order->status->name . '</span>';
            } elseif ($order->status_id == 6) {
                return '<span class="badge bg-success-subtle text-success text-uppercase">' . $order->status->name . '</span>';
            } elseif ($order->status_id == 7) {
                return '<span class="badge bg-danger-subtle text-danger text-uppercase">' . $order->status->name . '</span>';
            }
        })
        ->addColumn('action', 'dashboard.backend.orders.actions')

        ->rawColumns(['status', 'action'])

        ->make(true);
    }

    public function update_status(Request $request , $order){


       if($request->status_id == 2 ){

            $order->update([
                'status_id'      => 2 ,
                'date_progress'  => now()
            ]);

       }elseif($request->status_id == 3 ){

            $order->update([
                'status_id'        => 3 ,
                'date_processing'  => now()
            ]);
       }elseif($request->status_id == 4 ){

            $order->update([
                'status_id'   => 4 ,
                'date_done'   => now()
            ]);
       }elseif($request->status_id == 5 ){

            $order->update([
                'status_id'       => 5 ,
                'date_delivery'   => now()
            ]);
       }elseif($request->status_id == 6 ){

            $order->update([
                'status_id'       => 6 ,
                'date_complete'   => now() ,
            ]);

            foreach ($order->items as $item) {
                $product = $this->productRepo->findWhere(['id' => $item->product_id]);

                $product->update([
                  'qty' => $product->qty - $item->qty
                ]);
            }

       }elseif($request->status_id == 7){
            $order->update([
                'status_id'       => 7,
                'date_canceled'      => now()
            ]);

            foreach ($order->items as $item) {
                $product = $this->productRepo->findWhere(['id' => $item->product_id]);

                $product->update([
                  'qty' => $product->qty + $item->qty
                ]);
            }

       }

    }



}
