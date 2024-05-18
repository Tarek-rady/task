<?php

namespace App\Services\Admin;
use App\Http\Controllers\Dashboard\HelperTrait;
use App\Repositories\Sql\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    use HelperTrait;
    protected $productRepo ;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo    = $productRepo ;
    }

    public function get_products(){

        $products = $this->productRepo->query();
        return $this->columns($products);
    }

    public function columns($products){
        return DataTables($products)
        ->filterColumn('category', function($query , $keyword) {
            $query->whereRelation('category' , 'id' , $keyword);
        })

        ->editColumn('category' , function($product){
            return $product->category->name;
        })
        ->addColumn('action', 'dashboard.backend.products.actions')
        ->rawColumns(['action'])
        ->make(true);
    }

    public function add_product(Request $request , $data){
        $this->addImage($request, $data, 'img', 'products');
        $product =$this->productRepo->create($data);
        $this->images($request , $product);
        $this->sizes($request , $product);
        $this->colors($request , $product);

    }

    public function update_product(Request $request , $data , $product){
        $this->updateImg($request, $data, 'img', 'products' , $product);
        $product->update($data);
        $this->images($request , $product);
        $this->sizes($request , $product);
        $this->colors($request , $product);

    }

    public function images($request , $product){

        $files = $request->file('images');

        if ($request->hasFile('images')) {
            if($product->images){
                Storage::delete($product->images()->pluck('img')->toArray());
                $product->images()->delete();
            }

            foreach ($files as $file) {
                $image = $file->store('images');
                $product->images()->create([
                    'img'=>$image ,
                    'type' => 'img'
                ]);
            }
        }


    }

    public function sizes($request , $product){
        if(isset($request->size_ar)){
            if($product->sizes){
                $product->sizes()->delete();
            }
              foreach ($request->size_ar as $key => $product_size) {
                 $product->sizes()->create([
                    'size_ar'  => $product_size ,
                    'size_en'  => $request->size_en[$key] ,
                    'code_size'=> $request->code_size[$key] ,
                    'type'     => 'size'
                 ]);
              }
           }
    }

    public function colors($request , $product){
        if(isset($request->color_ar)){
            if($product->colors){
                $product->colors()->delete();
            }
            foreach ($request->color_ar as $key => $product_color) {
                $product->colors()->create([
                    'color_ar'   => $product_color ,
                    'color_en'   => $request->color_en[$key] ,
                    'code_color' => $request->code_color[$key] ,
                    'type'       => 'color' ,
                ]);
            }
        }
    }

    public function delete($product){
        if ($product->img) {
            Storage::delete($product->img);
        }

        if($product->images){
            Storage::delete($product->images()->pluck('img')->toArray());
            $product->images()->delete();
        }

        $product->delete();

    }


}
