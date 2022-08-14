<?php

namespace App\Http\Controllers\Admin;
use App\Models\Remark;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemarkController extends Controller
{
    public function comments(Request $request, $product)
    {
        $productId = $product;
        $Idproduct = Product::find($product);
        $cmt = new Remark();

        $cmt->product_id = $productId;
        $cmt->user_id = Auth::user()->id;
        $cmt->content = $request->input('content');
        $cmt->status = 0;
        //    $cmt::create($request->all());
        $cmt->save();
        return redirect()->route('detail', $Idproduct);
    }
    public function index()
    {
        $cmt = Remark::select('remarks.*')
            ->with('products', 'users')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.comments.index', [
            'cmt' => $cmt,
        ]);
    }
}
