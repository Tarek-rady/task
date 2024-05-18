<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PaymentRequest;
use App\Repositories\Sql\OrderRepository;
use App\Services\Api\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ApiResponseTrait ;

    protected $paymentService , $orderRepo;

    public function __construct(PaymentService $paymentService , OrderRepository $orderRepo)
    {
        $this->paymentService = $paymentService ;
        $this->orderRepo      = $orderRepo      ;
    }


    public function orderPay(PaymentRequest $request){

        $user = auth()->user();
        $order = $this->orderRepo->getWhere([ ['user_id' , $user->id] , ['code' , $request->code]])->first();

        $data = [
            'InvoiceValue'       => $order->total,
            'CustomerName'       => $user->name,
            'NotificationOption' => 'LNK',
            'DisplayCurrencyIso' => 'SAR',
            'CustomerMobile'     => $user->phone,
            'CustomerEmail'      => 'email@example.com',
            'CallBackUrl'        => 'https://www.google.com/',
            'ErrorUrl'           => 'https://www.youtube.com/',
            'Language'           => 'en',
            'CustomerReference'  => $order->code,
        ];


        return $this->paymentService->sendPayment($data);
    }

}
