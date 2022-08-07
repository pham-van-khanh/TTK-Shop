<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        //    xử lý checkout
        if (empty(Auth::user())) {
            Session::flash('error', 'Bạn cần phải đăng nhập ');
            return view('page.login');
        } else {
            $carts = Session::get('carts');
            if (empty($carts)) {
                $carts = [];
            }
            $productId = array_keys($carts);
            $productsCart = Product::select('id', 'name', 'price_new', 'image')
                ->where('products.active', 1)
                ->whereIn('id', $productId)
                ->get();
            // dd($productId);
            return view('page.check-out', [
                'productsCart' => $productsCart,
                'carts' => Session::get('carts'),
            ]);
        }
    }
    public function addCustomer(Request $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['note'] = $request->note;
        $data['status'] = 0;
        $customer_id = DB::table('customers')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        // dd($customer_id);
        if (empty(Auth::user())) {
            Session::flash('error', 'Bạn cần phải đăng nhập ');
            return view('page.login');
        } else {
            $carts = Session::get('carts');
            if (empty($carts)) {
                $carts = [];
            }
            $productId = array_keys($carts);
            $productsCart = Product::select('id', 'name', 'price_new', 'image')
                ->where('products.active', 1)
                ->whereIn('id', $productId)
                ->get();

            return view('page.pay', [
                'productsCart' => $productsCart,
                'carts' => Session::get('carts'),
            ]);
        }
    }
    public function checkout()
    {
        if (empty(Auth::user())) {
            Session::flash('error', 'Bạn cần phải đăng nhập ');
            return view('page.login');
        } else {
            $carts = Session::get('carts');
            if (empty($carts)) {
                $carts = [];
            }
            $productId = array_keys($carts);
            $productsCart = Product::select('id', 'name', 'price_new', 'image')
                ->where('products.active', 1)
                ->whereIn('id', $productId)
                ->get();

            return view('page.pay', [
                'productsCart' => $productsCart,
                'carts' => Session::get('carts'),
            ]);
        }
    }
    // thêm đồ vào db orders
    public function order(Request $request)
    {
        Session::get('customer_id');
        if (empty($carts)) {
          $carts = [];
         }
         $carts = Session::get('carts');  
        $productId = array_keys($carts);

        $productsCart = Product::select('id', 'name', 'price_new', 'image','active')
          ->where('products.active', 1)
          ->whereIn('id', $productId)
          ->get();

        $data_orders = [];
        foreach ($productsCart as $key => $value) {
          $data_orders[]=[
          'customer_id' => Session::get('customer_id'),
          'price' =>  $value->price_new,
          'product_id' => $value->id,
          'quantity' => $carts[$value->id],
          'status'=> 0,
          ];
        }
        Order::insert($data_orders);
        Session::forget('carts');
        Session::flash('success', 'Đặt hành thành công');
        return view('page.user');
    }
    public function showCartClient()
    {
     $orders = DB::table('orders')->select('id','customer_id','total');
    }
}
