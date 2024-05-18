<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartRequest;
use App\Http\Requests\Api\ItemRequest;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Requests\Api\UpdateQtyRequest;
use App\Http\Resources\Api\OrderResource;
use App\Repositories\Sql\CartRepository;
use App\Repositories\Sql\OrderRepository;
use App\Repositories\Sql\ProductRepository;
use App\Services\Api\CartService;

class CartController extends Controller
{
    use ApiResponseTrait ;

    protected $cartService , $productRepo , $orderRepo , $itemRepo;

    public function __construct(CartService $cartService , ProductRepository $productRepo , OrderRepository $orderRepo , CartRepository $itemRepo)
    {
        $this->cartService  = $cartService ;
        $this->orderRepo    = $orderRepo ;
        $this->itemRepo     = $itemRepo ;
        $this->productRepo = $productRepo ;
    }


    public function add_to_cart(CartRequest $request){

        $product = $this->productRepo->findWhere(['id' => $request->product_id]);

        $cart = auth()->user()->cart;
        if($cart){

            $check_product = $this->itemRepo->getWhere([['product_id', $product->id], ['order_id', $cart->id]])->first();
            $this->cartService->check_product($check_product , $cart , $product , $request);
        }else{
            $order_id = $this->orderRepo->getWhere([['code', $request->code], ['type', 'cart']])->first();

            if($order_id){

                $this->cartService->create_items($order_id , $product , $request);
            }else{
                $order = $request->except('user_id', 'order_code' , 'code' , 'status_id' , 'buy' , 'date_order' , 'product_id' , 'qty' );
                 $this->cartService->create_order($request , $order , $product);
            }
        }

        return $this->ApiResponse(true , 'تم الاضافه بنجاح', 200);
    }

    public function cart_user(){
        $cart = auth()->user()->cart ;
        return $this->cartService->cart_user($cart);
    }

    public function delete_item(ItemRequest $request){

        $item = $this->itemRepo->findWhere(['id' => $request->item_id]);
        if($item){
            $product = $this->productRepo->findWhere(['id' => $item->product_id]);
            $this->cartService->new_total($request , $item , $product);
            $item->delete();
            return $this->ApiResponse(true, 'تم الحذف بنجاخ', 200);
        }


    }

    public function delete_items(){
         $cart = auth()->user()->cart ;
        if($cart){
            foreach ($cart->items as $item) {
              $item->delete();
            }
            $cart->update(['total' => 0]);
            return $this->ApiResponse(true, 'تم الحذف بنجاخ', 200);
        }else{
            return $this->notFoundResponse();
        }
    }

    public function update_qty(UpdateQtyRequest $request){

        $item = $this->itemRepo->findWhere(['id' => $request->item_id]);
        if($item){
           $cart = $item->order;
           $product = $this->productRepo->findWhere(['id' => $item->product_id]);
           $this->cartService->new_total($request , $item , $product);
           $this->cartService->update_qty($request , $item , $product , $cart);
           return $this->cartService->cart_user($cart);
        }
    }

    public function create_order(OrderRequest $request){

        $order = auth()->user()->cart ;
        if($order){
            $data = $request->only('address');
            $data['date_order'] = now();
            $data['type'] = 'order' ;
            $data['payment_method'] = 'visa' ;
            $data['cost'] = $order->total ;
            $data['shipping_tax'] = $order->shipping_tax ;
            $data['total'] = $order->total + $order->shipping_tax;
            $order->update($data);
            return $this->ApiResponse(true , 'تم طلب الاوردر بنجاح' , 200);
        }else{
            return $this->notFoundResponse();
        }
    }

    public function order_details($code){
        $order = $this->orderRepo->getWhere([['code' , $code] , ['user_id' , auth()->user()->id] , ['type' , 'order']])->first();
        if($order){
            return $this->ApiResponse(new OrderResource($order) , '' , 200);
        }else{
            return $this->notFoundResponse();
        }
    }



}
