<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
class ShopController extends Controller
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
    public function productDetail(Product $product,Gallery $images )
    {
            $images = Gallery::where('product_id', $product->id)->get();
            $category = Category::where('active', 1)->get();
        return view('page.product-detail',[
            'product'=> $product,
            'categories' => $category,
            'images'=> $images
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
    public function getProductBottom()
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
        // lấy ra các sản phẩm
    }
}
