<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run(): void
    {
        Category::insert([

            [
                'name_ar'    => 'قسم الالكترونيات' ,
                'name_en'    => 'electronics' ,
                'img'        => 'categories/1.jpg' ,
                'created_at' => now() ,
            ] ,


            [
                'name_ar'    => 'قسم الادوات المنزليه' ,
                'name_en'    => 'Housewares' ,
                'img'        => 'categories/2.jpg' ,
                'created_at' => now() ,
            ] ,


            [
                'name_ar'    => 'قسم الملابس' ,
                'name_en'    => 'Clothes' ,
                'img'        => 'categories/3.jpg' ,
                'created_at' => now() ,
            ] ,

        ]);
    }
}
