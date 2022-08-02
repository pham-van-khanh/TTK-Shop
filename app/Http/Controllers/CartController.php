<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
class CartController extends Controller
{
   public function addToCart(Product $product)
   {
    dd("add to cart----" .$product->id);

   }
}
