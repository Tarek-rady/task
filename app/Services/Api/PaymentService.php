<?php

namespace App\Services\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class PaymentService
{

   private $request_client ;
   private $baseUrl;
   private $headers ;

    public function __construct(Client $request_client)
    {
       $this->request_client = $request_client ;
       $this->baseUrl = env('FATOORA_URL');
       $this->headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . env('FATOORA_TOKEN') ,
       ];
    }


    public function bulidRequest($url , $method , $data = []){


        $request = new Request($method , $this->baseUrl . $url , $this->headers);


        $response = $this->request_client->send($request , [
            'json' => $data
        ]);

        if($response->getStatusCode() != 200){
           return 'Error' ;
        }

        $response = json_decode($response->getBody() , true);

        return $response ;
    }


    public function sendPayment($data){
       return $response = $this->bulidRequest('/v2/sendPayment' , 'POST' , $data);
    }



}
