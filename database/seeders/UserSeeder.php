<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $fake = Factory::create();

        for ($i=1; $i < 25 ; $i++) {

            User::create([
                'name'               => $fake->name() ,
                'email'              => $fake->unique()->email() ,
                'phone'              => $fake->phoneNumber() ,
                'img'                => 'users/1.png' ,
                'password'           => bcrypt('password') ,
                'email_verified_at'  => now() ,
                'is_active'          => 0 ,
                'created_at'         => now()
            ]);

        }




    }
}
