<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Order;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();

        for ($i=1; $i < 100 ; $i++) {
            Order::create([
                'user_id'         => rand(1 , 24) ,
                'status_id'       => rand( 1 , 7 ) ,
                'code'            => $fake->unique()->numberBetween(1000 , 9999) ,
                'type'            => 'order' ,
                'cost'            => 100 ,
                'shipping_tax'    => 5 ,
                'total'           => 105 ,
                'payment'         => 'paid' ,
                'payment_method'  => 'cash' ,
                'address'         => $fake->address() ,
                'created_at'      => now() ,
                'date_order'      => now()
            ]);
        }


        $orders = Order::get();

        foreach ($orders as $order) {
           for ($i=1; $i < 4 ; $i++) {
                $qty = rand(1 , 3) ;
                $price = rand(10 , 20) ;
                $total = $qty * $price ;
                Cart::create([
                    'product_id'   => rand(1 , 9) ,
                    'order_id'     => $order->id ,
                    'qty'     => $qty ,
                    'price'   => $price ,
                    'total'   => $total ,
                ]);
           }
        }
    }
}
