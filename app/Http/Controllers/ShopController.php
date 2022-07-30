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
    }
    public function getCateDetail(Product $product,Category $category)
    {
        # code...
        $product = Product::with('category')
        ->where('category_id',$category->id)
        // ->Paginate(4)
        ->get();
        
    $category = Category::where('active', 1)->get();
        return view('page.categoryDetail',
        ['product'=>$product,'category'=>$category]);   
    }
    public function productDetail(Product $product,Gallery $images )
    {
            $images = Gallery::where('product_id', $product->id)->get();
            $category = Category::where('active', 1)->get();
        // dd($images);
        return view('page.product-detail',[
            'product'=> $product,
            'categories' => $category,
            'images'=> $images
        ]);
    }
    public function getCate()
    {
        $category = Category::where('active', 1)
        ->with('products')
        ->get();
        return view('page.category',[
          'category' => $category,  
        ]);
    }
}
