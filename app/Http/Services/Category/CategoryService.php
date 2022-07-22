<?php

namespace App\Http\Services\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CategoryService{
//
    public  function  getParent(){
        return Category::where('parent_id',0)->get();
    }

    public  function create($request){
        try {
            Category::create([
                    'name' =>(string)$request->input('name'),
                    'parent_id' =>(int)$request->input('parent_id'),
                    'description' =>(string)$request->input('description'),
                    'content' =>(string)$request->input('content'),
                    'image' =>(string)$request->input('image'),
                    'active' =>(string)$request->input('active'),
                    'slug' => Str::slug($request->input('name'), '-')
                ]);
//             tạo thông báo khi create thành công
             Session::flash('success','Tạo mới thành công');
        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
            return  true;

    }
    public function edit($request,$id)
    {
        $category = Category::find($id);
        $category ->fill($request->all());
        $category->save();
        Session::flash('success','Cập Nhật thành công');
        return redirect()->route('category');
    }
}
