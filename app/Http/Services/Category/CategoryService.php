<?php

namespace App\Http\Services\Category;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryService
{
    //
    // public  function  getParent(){
    //     return Category::where('',0)->get();
    // }

    public function create($request)
    {
        $category = new Category();
        // $user->name = $request->name;
        // 1. Nhập các trường dữ liệu gửi lên vào $user
        // Chú ý đặt tên cho name === tên thuộc tính
        $category->fill($request->all());

        // 2. Kiểm tra file và lưu
        if ($request->hasFile('image')) {
            // 2.1 Xử lý tên file
            $image = $request->image;
            $imageName = $image->hashName();
            $imageName = $request->name . '_' . $imageName;

            $category->image = $image->storeAs('images/category', $imageName);
        } else {
            $category->image = '';
        }
        $category->slug = Str::slug($request->input('name'), '-');
        $category->save();
        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('category');
    }

    public function update($request, $category)
    {
        $category = Category::find($category);
        $category->fill($request->all());
        if ($category) {
            if ($category->image != null) {
                if ($request->hasFile('image')) {
                    // 2.1 Xử lý tên file
                    $image = $request->image;
                    $imageName = $image->hashName();
                    $imageName = $request->name . '_' . $imageName;
        
                    $category->image = $image->storeAs('images/category', $imageName);
                } else {
                    $category->image = '';
                }
            }
        }

        $category->save();
        Session::flash('success', 'Cập Nhật thành công');
        return redirect()->route('category');
    }
}
