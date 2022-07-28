<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function addGallery( $product)
    {
        # code...
        $prd_id = $product;
        return view('admin.gallries.add')->with(compact('prd_id'));
        
    }
    public function store(Request $request)
    {
        $gallery = new Gallery();
        $gallery->fill($request->all());
        dd($gallery);
        // if ($request->hasFile('avatar')) {
        //     $avatar = $request->avatar;
        //     $avatarName = $avatar->hashName();
        //     $avatarName = $request->username . '_' . $avatarName;
        //     $user->avatar = $avatar->storeAs('images/users', $avatarName);
        // } else {
        //     $user->avatar = '';
        // }
        // $user->password = hash($user->password);
        // // 3. Lưu $user vào CSDL
        // $user->save();
        // return redirect()->route('users.list',$this->data);
    }
}
