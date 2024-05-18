<?php

namespace App\Services\Api;

use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Http\Resources\Api\ItemResource;
use App\Models\Order;
use App\Repositories\Sql\OrderRepository;
use Faker\Factory;
use Illuminate\Http\Request;

class CartService
{
    use HelperTrait , ApiResponseTrait;

    protected $orderRepo ;
    public function __construct(OrderRepository $orderRepo )
    {
       $this->orderRepo   = $orderRepo ;
    }

    public function create_order(Request $request , $order , $product){
        $user = auth()->user();
        $lastSellerOrder = Order::where('user_id', $user->id)->latest()->first();
        $fake = Factory::create();
        $code = $fake->unique()->numberBetween(10000 , 99999);
        $order['user_id'] = $user->id;
        $order['code'] = $code;
        $order['status_id'] = 1;
        $order['shipping_tax'] = 5 ;
        $new_order = $this->orderRepo->create($order);
        $this->total($new_order , $product , $request);
        $this->create_items($new_order , $product , $request);

    }

    public function check_product($check_product , $cart , $product , $request){
        if($check_product){
            $qty = $check_product->qty + $request->qty;
            $check_product->update([
                'qty' => $qty ,
                'total' => $qty * $product->price
            ]);
        }else{
            $this->create_items($cart , $product , $request);
        }

        $newTotal = ($product->price * $request->qty) + $cart->total;
        $cart->update([
          'total' => $newTotal
        ]);
    }

    public function total($new_order , $product , $request){
        $total = $product->price * $request->qty;
        $new_order->update([

            'total' => $total
        ]);
    }

    public function create_items($new_order , $product , $request){
        $total = $product->price * $request->qty;
        $new_order->items()->create([
            'product_id'  => $product->id ,
            'qty'          => $request->qty ,
            'price'        => $product->price ,
            'total'        => $total ,
        ]);
    }

    public function cart_user($cart){

        if ($cart) {
            $items = $cart->items;
            $items_count = $items->count();
            $data['order_id'] = $cart->id ;
            $data['order_code'] = $cart->code ;
            $data['cart'] = ItemResource::collection($items);
            $data['items_count'] = $items_count ? $items_count : '0';
            $data['cost'] = $cart->total;
            $data['shipping_tax'] = $cart->shipping_tax;
            $data['total'] = $cart->total + $cart->shipping_tax;
            return $this->ApiResponse($data, '', 200);
        } else {
            $data['cart'] = [];
            $data['items_count'] = 0;
            $data['cost'] = "0" ;
            $data['shipping_tax'] = "0" ;
            $data['total'] = "0" ;
            return $this->ApiResponse($data, '', 200);
        }
    }




    public function update_qty($request , $item , $product , $cart){
        $item->update([
            'qty'   => $request->qty ,
            'total' => $product->price * $request->qty
       ]);
       $new_total = ($product->price * $request->qty ) + $cart->total ;
       $cart->update([
          'total' => $new_total
       ]);
    }

    public function new_total($request , $item , $product){
        if($item){
            $cart = $item->order;
            $old_total = $product->price * $item->qty ;
            $new_total = $cart->total - $old_total ;
            $cart->update(['total' => $new_total ]);
        }
    }



}
