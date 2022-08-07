<?php

namespace App\Http\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class HandleCart
{
    public function handleAddToCart($request): bool
    {

        $quantity = (int) $request->input('num_product');
        $product_id = (int) $request->input('product_id');
        // dd($quantity);

        //    Session::forget('carts');
        $carts = Session::get('carts');
        // $carts là 1 array

        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $quantity
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        // dùng exitst để lấy ra $product_id và kiểm tra xem đã có trong giỏ hàng hay chưa
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $quantity;
            //update số lượng mới và số lượng có trong cart cũ
            Session::put('carts',$carts);
            // khi mà update thì nó cập nhật toàn bộ cho cái biến carts thì mình gán $product_id cho cái carts
            return true;
        }

        $carts[$product_id] = $quantity;
        Session::put('carts',$carts);
        return true;



    }

}
