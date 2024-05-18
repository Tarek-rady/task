<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('lang')->group(function () {



    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);




    // ========================= routes auth driver ========================================
    Route::middleware('auth:sanctum')->group(function () {

        // auth user

        Route::group(['prefix' => 'user'] , function(){
            Route::post('/update-profile'  , [AuthController::class , 'update_profile']);
            Route::post('/delete-profile'  , [AuthController::class , 'delete_profile']);
            Route::get('/get-profile'      , [AuthController::class , 'get_profile']);
            Route::get('/delete-profile'   , [AuthController::class , 'delete_profile']);
            Route::post('/reset-password'  , [AuthController::class , 'reset_password']);
            Route::post('/change-password' , [AuthController::class , 'change_Password']);
            Route::post('/logout'          , [AuthController::class , 'logout']);

        });


        Route::post('add-to-cart'      , [CartController::class , 'add_to_cart']);
        Route::get('cart-user'         , [CartController::class , 'cart_user']);
        Route::post('delete-item'      , [CartController::class , 'delete_item']);
        Route::get('delete-items'      , [CartController::class , 'delete_items']);
        Route::post('update-qty'       , [CartController::class , 'update_qty']);
        Route::get('order-details/{id}', [CartController::class , 'order_details']);
        Route::post('create-order'     , [CartController::class , 'create_order']);

        Route::post('puy-order'        , [PaymentController::class , 'orderPay']);

    });
    // ====================== routes not auth ===========================================


     Route::get('categories'            , [ProductController::class , 'categories']);
     Route::get('products/{id}'         , [ProductController::class , 'productd_by_category']);
     Route::get('products'              , [ProductController::class , 'products']);
     Route::get('product-details/{id}'  , [ProductController::class , 'product_details']);




















});
