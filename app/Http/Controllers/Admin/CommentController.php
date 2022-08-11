<?php

namespace App\Http\Controllers\Admin;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function comments(Request $request,$product)
    {
       $productId = $product;
       $Idproduct = Product::find($product);
       $cmt = new Comment;
       $cmt->product_id = $productId;
       $cmt->user_id = Auth::user()->id;
        $cmt->content = $request->input('content');
        $cmt->status = 0;
      
       $cmt::create($request->all());
       Session::flash('success','Bình luận thành công');
       return view('page.product-detail'.'/'.$Idproduct);
    }
}
