<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;

class HomeController extends Controller
{
    public function home()  {

        $roles = Role::count();
        $admins = Admin::count();
        $users = User::count();

        $categories = Category::count();
        $products = Product::count();
        $orders = Order::count();



        return view('dashboard.home' , compact('roles' , 'admins' , 'users' , 'categories' , 'products' , 'orders'));
    }




}
