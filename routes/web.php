<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/





Route::get('/opt', function () {
    Artisan::call('optimize');
    return 0;
});

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language');

Route::get('/', [AuthController::class , 'showLoginForm'])->name('login');


Route::prefix('admin')->middleware('localization')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class , 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class , 'login'])->name('login.post');



    /* Dashboard Routes */
    Route::middleware('auth:admin')->group(function () {

        Route::get('/home', [HomeController::class , 'home'])->name('home');
        Route::get('logout', [AuthController::class , 'logout'])->name('logout');

        // roles
        Route::resource('roles', RoleController::class)->name('*','roles');
        Route::get('get-roles' , [RoleController::class , 'get_roles'])->name('get-roles');

        // admins
        Route::resource('/admins' , AdminController::class);
        Route::get('get-admin' , [AdminController::class , 'get_admins'])->name('get-admins');



        // users
        Route::resource('/users' , UserController::class);
        Route::get('get-users'   , [UserController::class , 'get_users'])->name('get-users');
        Route::get('/changeActiveUser', [UserController::class , 'changeActiveUser'])->name('changeActiveUser');
        Route::get('export-users'       , [UserController::class , 'export'])->name('export-users');
        Route::get('import-user' , [UserController::class , 'show_import'])->name('import-show');
        Route::post('import-users' , [UserController::class , 'import'])->name('import-users');

        // categories
        Route::resource('/categories' , CategoryController::class);
        Route::get('get-categories'   , [CategoryController::class , 'get_categories'])->name('get-categories');

        // products
        Route::resource('/products' , ProductController::class);
        Route::get('get-products'   , [ProductController::class , 'get_products'])->name('get-products');

        // orders
        Route::resource('/orders' , OrderController::class);
        Route::get('get-orders'   , [OrderController::class , 'get_orders'])->name('get-orders');
        Route::put('update-status/{order_id}' , [OrderController::class , 'update_status'])->name('update-status');



    });


});

