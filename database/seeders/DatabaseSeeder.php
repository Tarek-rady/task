<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

       $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        // $this->call(OrderSeeder::class);




    }
}
