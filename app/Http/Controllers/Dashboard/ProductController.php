<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Repositories\Sql\CategoryRepository;
use App\Repositories\Sql\ProductRepository;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    protected $productRepo , $categoryRepo , $productService;
    public function __construct(ProductRepository $productRepo , CategoryRepository $categoryRepo , ProductService $productService)
    {
        $this->middleware('permission:products-read')->only(['index']);
        $this->middleware('permission:products-create')->only(['create', 'store']);
        $this->middleware('permission:products-update')->only(['edit', 'update']);
        $this->middleware('permission:products-delete')->only(['destroy']);
        $this->productRepo = $productRepo ;
        $this->categoryRepo = $categoryRepo ;
        $this->productService = $productService ;
    }


    public function get_products()
    {
        return $this->productService->get_products();
    }

    public function index()
    {
        $categories = $this->categoryRepo->getAll();
        return view('dashboard.backend.products.index' , compact('categories'));
    }


    public function create()
    {
        $categories = $this->categoryRepo->getAll();
        return view('dashboard.backend.products.create', compact('categories'));
    }


    public function store(ProductRequest $request)
    {

        $data = $request->except('img' , 'images' , 'size_ar' , 'size_en' , 'color_ar' , 'color_en' , 'code_size' , 'code_color' );
        $this->productService->add_product($request , $data);
       return redirect(route('admin.products.index'))->with('success', __('models.added_successfully'));

    }


    public function show($id)
    {
        $product = $this->productRepo->findOne($id);
        return view('dashboard.backend.products.show' , compact('product'));

    }


    public function edit($id)
    {
        $product = $this->productRepo->findOne($id);
        $categories = $this->categoryRepo->getAll();
        return view('dashboard.backend.products.edit' , compact('product' , 'categories'));

    }


    public function update(ProductRequest $request, $id)
    {
        $product = $this->productRepo->findOne($id);
        $data = $request->except('img' , 'images' , 'size_ar' , 'size_en' , 'color_ar' , 'color_en' , 'code_size' , 'code_color' );
        $this->productService->update_product($request , $data , $product);
        return redirect(route('admin.products.index'))->with('success', __('models.updated_successfully'));
    }


    public function destroy($id)
    {
         $product = $this->productRepo->findOne($id);

         $this->productService->delete($product);


        return redirect(route('admin.products.index'))->with('success', __('models.deleted_successfully'));

    }
}
