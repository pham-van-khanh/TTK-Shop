<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    //

    public function index()
    {
        # code...
        $this->data['errorMsg'] = 'Thêm lỗi';
        return view('page.login', ['title' => 'Đăng Nhập'], $this->data);
    }
    public function store(Request $request)
    {
        # code...
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role' => 1], $request->input('remember'))) {
            return redirect()->route('admin');
        } elseif (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'role' => 0], $request->input('remember'))) {
            return redirect()->route('home-page');
        }
        Session::flash('error', 'Email hoặc Password không chính xác');
        return redirect()->back();
    }
}
