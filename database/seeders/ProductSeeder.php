<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run(): void
    {
        Product::insert([

            [
                'name_ar'    => 'ايفون 13' ,
                'name_en'    => 'ipone 13' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/1.png' ,
                'category_id'=> 1 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,

            [
                'name_ar'    => 'ايفون 12' ,
                'name_en'    => 'ipone 12' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/2.png' ,
                'category_id'=> 1 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,

            [
                'name_ar'    => 'لابتوب' ,
                'name_en'    => 'laptop' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/3.png' ,
                'category_id'=> 1 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,


            [
                'name_ar'    => 'رنين' ,
                'name_en'    => 'ringing' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/4.png' ,
                'category_id'=> 2 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,

            [
                'name_ar'    => 'مكنسه كهربائيه' ,
                'name_en'    => 'vacuum cleaner' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/5.png' ,
                'category_id'=> 2 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,

            [
                'name_ar'    => 'خلاط كهربائي' ,
                'name_en'    => 'An electric mixer' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/6.png' ,
                'category_id'=> 2 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,


            [
                'name_ar'    => 'تيشيرتات بولو' ,
                'name_en'    => 'Polo T-shirts' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/7.png' ,
                'category_id'=> 3 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,

            [
                'name_ar'    => 'كاجوال' ,
                'name_en'    => 'Casual' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/8.png' ,
                'category_id'=> 3 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,

            [
                'name_ar'    => 'كلاسيك' ,
                'name_en'    => 'classic' ,
                'price'      => rand(10 , 20) ,
                'qty'        => rand(5 , 10) ,
                'img'        => 'products/9.png' ,
                'category_id'=> 3 ,
                'desc_ar'            => 'هذا النص هو مثال لنص يمكن استبداله في نفس المساحه لقد تم توليد هذا النص من مولد النص العربي',
                'desc_en'            => 'This text is an example of text that can be replaced in the same space. This text was generated from the Arabic text generator',
                'created_at' => now()
            ] ,




        ]);
    }
}
