<?php

namespace App\Http\Services\Product;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class ProductAdminService
{
public  function getCate(){
    return Category::where('active', 1)->get();
}
public  function create($request){
    try {
        $product = new Product();
        $product->fill($request->all());
        if ($product) {
            if ($product->image != null) {
                if ($request->hasFile('image')) {
                    // 2.1 Xử lý tên file
                    $image = $request->image;
                    $imageName = $image->hashName();
                    $imageName = $request->name . '_' . $imageName;
        
                    $product->image = $image->storeAs('images/products', $imageName);
                } else {
                    $product->image = '';
                }
            }
        }
        $product->save();
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('product');
    } catch (\Exception $err){
        Session::flash('error',$err->getMessage());
        return false;
    }
    return true;
}
    public  function getAll(){
        return Product::with('category')
        ->orderByDesc('id')->paginate(5);
    }
    public  function update($request,$product)
    {
        try {
            $product->fill($request->all());
            if ($request->hasFile('image')) {
                $image = $request->image;
                $imageName = $image->hashName();
                $imageName = $request->name . '_' . $imageName;
                $product->image = $image->storeAs('images/products', $imageName);
            } else {
                $product->image = '';
            }
            $product->save();
            Session::flash('success', 'Cập Nhật thành công');
            return redirect()->route('product');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi khi cập nhật');
            return false;
        }
        return true;
    }
}
