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
        Product::create([
            'name' =>(string)$request->input('name'),
            'category_id' =>(integer)$request->input('category_id'),
            'description' =>(string)$request->input('description'),
            'price_old' =>(integer)$request->input('price_old'),
            'price_new' =>(integer)$request->input('price_new'),
            'image' =>(string)$request->input('image'),
            'active' =>(integer)$request->input('active'),
        ]);
//             tạo thông báo khi create thành công
        Session::flash('success','Tạo mới thành công');
    } catch (\Exception $err){
        Session::flash('error',$err->getMessage());
        return false;
    }
    return  true;
}
    public  function getAll(){
        return Product::with('category')
        ->orderByDesc('id')->paginate(5);
    }
    public  function update($request,$product)
    {
        try {
            $product->fill($request->all());
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
