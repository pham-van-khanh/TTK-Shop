<?php

namespace App\Http\Controllers\Admin;
use App\Http\Services\HandleCart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class CartController extends Controller
{
    protected $handleCart;
        public function __construct(HandleCart $handleCart)
        {
            $this->handleCart = $handleCart; // khai báo hàm này
        }

        public function addToCart(Request $request)
        {
            $result = $this->handleCart->handleAddToCart($request);
            if ($result === false) {
                return redirect()->back();
            }

            return redirect('/gio-hang');
        }


     public function showCart()
     {
        //    Session::forget('carts');
        $carts = Session::get('carts');
        if (empty($carts)) {
           $carts = [];
         }
        $productId = array_keys($carts); //trả về 1 tập hợp có mảng xác định là $carts
        $productsCart =  Product::select('id','name','price_new','image')
            ->where('products.active',1)
            ->whereIn('id',$productId)
            ->get();

        return view('page.cart.cart',
        [

            'productsCart'=>$productsCart,
            'carts'=>Session::get('carts')
        ]
        );
     } //show ra giỏ hàng 

     public function updateCart(Request $request)
     {
        Session::put('carts',$request->input('num_product'));
         return redirect()->route('cart');

     } //update số lượng
     public function deleteCart($id = 0)
     {
        // lấy mảng ra
        $carts = Session::get('carts');
        unset($carts[$id]);
        // tìm ra id và xóa, sau đó cập nhật lại
        Session::put('carts',$carts );
        // dd($carts);
        Session::flash('success','Xóa sản phẩm thành công');
        # code...
        return redirect('/gio-hang');
     } // xóa khỏi giỏ hàng

}
