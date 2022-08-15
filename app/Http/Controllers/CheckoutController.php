<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomerRequest;
use App\Jobs\PayEmail;
use Carbon\Carbon;
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
            return view('page.login.login');
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
            return view('page.cart.check-out', [
                'productsCart' => $productsCart,
                'carts' => Session::get('carts'),
            ]);
        }
        // hieenr thi ra all sp co trong gio hang
    }
    public function addCustomer(CustomerRequest $request)
    {
        $data = [];
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $data['name'] = $request->name;
        $data['user_id'] = Auth::user()->id;
        $data['email'] = $request->email;
        $data['order_time'] = $dt->toDateString();
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['note'] = $request->note;
        $data['status'] = 0;
        $customer_id = DB::table('customers')->insertGetId($data);
        PayEmail::dispatch($data['email'])->delay(now()->addSeconds(10));
        Session::put('customer_id', $customer_id);
        if (empty(Auth::user())) {
            Session::flash('error', 'Bạn cần phải đăng nhập ');
            return view('page.login.login');
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

            return view('page.cart.pay', [
                'productsCart' => $productsCart,
                'carts' => Session::get('carts'),
            ]);
        }
    }
//    tiến hàng thanh toán
    public function checkout()
    {
        if (empty(Auth::user())) {
            Session::flash('error', 'Bạn cần phải đăng nhập ');
            return view('page.login.login');
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

            return view('page.cart.pay', [
                'productsCart' => $productsCart,

                'carts' => Session::get('carts'),
            ]);
        }
    }
    // thêm đồ vào db orders
    public function order(Request $request)
    {
        // đã thanh toán thì là đơn mới
      $customer_id =  Session::get('customer_id');
        if (empty($carts)) {
            $carts = [];
        }
        $carts = Session::get('carts');
        $productId = array_keys($carts);

        $productsCart = Product::select('id', 'name', 'price_new', 'image', 'active')
            ->where('products.active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data_orders = [];

            foreach ($productsCart as $key => $value) {
                // if (Auth::user()->status != 5) {
                    $data_orders[] = [
                        'customer_id' => $customer_id,
                        'price' => $value->price_new,
                        'product_id' => $value->id,
                        'quantity' => $carts[$value->id],
                        'status' => 0,
                    ];

        }

        Order::insert($data_orders);
        Session::flash('success', 'Đặt hành thành công');
        Session::forget('carts');
        return redirect()->route('cart');
    }

    public function showCartClient()
    {
        $orders = DB::table('orders')->select('id', 'customer_id', 'total');
    }
}
