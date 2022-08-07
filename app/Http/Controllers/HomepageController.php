<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\User;
use App\Models\Product;
class HomepageController extends Controller
{
    public function getProduct()
    {
        $products = Product::with('category')
        ->join('categories', 'products.category_id', '=', 'categories.id')

        // ->join('sizes', 'products.size_id', '=', 'sizes.id')
        ->where('categories.active', '=', 1)
        ->where('products.active', '=', 1)
        ->select('products.*')
        ->orderBy('products.id', 'ASC')->Paginate(6);
        $category = Category::where('active', 1)->get();

        return view('page.shop',[
         'products' => $products, 'category' => $category,
        ]);
    }

    public function getCate()
    {

        $category = Category::where('active', 1)
        ->with('products')
        ->get();
        return view('page.homepage',[
          'category' => $category,
        ]);
    }
    // public function getUserDetail(User $users,Customer $customers)
    // {
    //     $customers = Customer::select('id', 'name', 'email', 'phone', 'address')->Paginate(3);
    //     return view('page.user',[
    //         'users' => $users,
    //         'customers' => $customers,
    //         'orders' => $customers
    //             ->orders()
    //             ->with('products')
    //             ->get(),
    //         ]);
    //         dd($customers);

    // }




}
