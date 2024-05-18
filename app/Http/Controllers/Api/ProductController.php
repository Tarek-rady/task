<?php

namespace App\Http\Controllers\Api;

use App\Events\PodcastProcessed;
use App\Http\Controllers\Api\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Http\Resources\Api\ProductDetailsResource;
use App\Http\Resources\Api\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Repositories\Sql\CategoryRepository;
use App\Repositories\Sql\ProductRepository;
use \vendor\laravel\framework\src\Illuminate\Pagination\LengthAwarePaginator;

class ProductController extends Controller
{
    use ApiResponseTrait ;

    protected $productRepo , $categoryRepo ;

    public function __construct(CategoryRepository $categoryRepo , ProductRepository $productRepo)
    {

        $this->categoryRepo = $categoryRepo ;
        $this->productRepo  = $productRepo ;

    }

    public function categories(){
      $categories = $this->categoryRepo->getAll();
      return $this->ApiResponse(CategoryResource::collection($categories) , '' , 200);
    }

    public function productd_by_category($category_id){
        $category = Category::with('products')->where('id' , $category_id)->first();
        return $this->ApiResponse(ProductResource::collection($category['products'])) ;
    }

    public function products(){
       $products = Product::OrderByDesc('id')->paginate(10);

       $response = [
            'products'   => ProductResource::collection($products) ,
            'pagination' => $products->toArrayPaginate()
       ];
       return $this->ApiResponse($response , '' , 200);
    }

    public function product_details($id){
       $product = Product::where('id' , $id)->first();
       if($product){
          $product->update([
            'viewer' => $product->viewer + 1
          ]);
          return $this->ApiResponse(new ProductDetailsResource($product) , '' , 200 );
       }else{
        return $this->notFoundResponse();
       }

    }


}


