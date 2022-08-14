<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Remark;
use App\Models\Order;
use App\Models\Gallery;
use App\Models\Comment;
use App\Models\Product;
class ShopController extends Controller
{

    public function getProduct()
    {
        $products = Product::with('category')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.active', '=', 1)
        ->where('products.active', '=', 1)
        ->select('products.*')
        ->orderBy('products.id', 'ASC')->Paginate(6);
        $category = Category::where('active', 1)->get();
        
        return view('page.shop',[
         'products' => $products, 'category' => $category,
        ]);
        // lấy ra các sản phẩm
    }
    public function getCateDetail(Product $product,Category $category)
    {
        # code...
        $product = Product::with('category')
        ->where('category_id',$category->id)
        ->get();
        $category = Category::where('active', 1)->get();
        return view('page.categoryDetail',
        ['product'=>$product,'category'=>$category]);
         //lấy ra danh sách các product thuộc 1 cate
    }
    public function productDetail(Product $product,Gallery $images,Order $orders )
    {
        $images = Gallery::where('product_id', $product->id)->get();
        $orders = Order::where('product_id',$product->id)->get();
        // dd($orders->count());
        $products = Product::with('category')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.active', '=', 1)
        ->select('products.*')
        ->orderBy('products.id', 'ASC')->Paginate(3);
        $comments = Remark::select('remarks.*')
        ->with('products','users')->orderBy('id','DESC')
        ->where('product_id', '=', $product->id)->get();
        $category = Category::where('active', 1)->get();
        return view('page.product-detail',[
            'products'=> $products,
            'product'=> $product,
            'categories' => $category,
            'images'=> $images,
            'comments'=> $comments,
            'orders'=> $orders,
        ]);

        
        // lấy ra detail 1 sản phẩm
    }
    public function getCate()
    {
        $category = Category::select('id', 'name', 'image')
        ->where('categories.active', '=', 1)
        ->with('products')
            ->paginate(3);
        return view('page.category',[
          'category' => $category,
        ]);
    }
    // public function getProductBottom(Product $product)
    // {
        
    //     return view('page.shop',[
    //         'products' => $products, 'category' => $category,
    //     ]);
    //     // lấy ra các sản phẩm
    // }
}
