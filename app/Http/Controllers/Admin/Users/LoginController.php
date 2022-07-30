<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    //

    public function index()
    {
        # code...
        $this->data['errorMsg'] = 'Đăng nhập lỗi';
        return view(
            'page.login',
            [
                'title' => 'Đăng Nhập',
                // 'url' =>$_SERVER['HTTP_REFERER']
            ],
            $this->data,
        );
    }
    public function store(LoginRequest $request)
    {
        # code...

        if (Auth::attempt(
                [
                    'email' => $request->input('email'),
                     'password' => $request->input('password'),],
                $request->input('remember'),)) {
            $auth = Auth::user();
                    if ($auth->role == 1) {
                        return redirect()->route('admin');
                    } else {
                        return redirect()->route('home-page');
                    }
        }
        Session::flash('error', 'Email hoặc Password không chính xác');
        return redirect()->back();
    }

    public function logOut(Request $request)
    {
        // xóa session user đã đăng nhập
        Auth::logout();
        // hủy toàn bộ session đi
        $request->session()->invalidate();
        // tạo token mới
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

// public function getLogin(Request $request)
//     {
//         $email = $request->email;
//         $password = $request->password;

//         // dd(Auth::attempt(['email' => $email, 'password' => $password]));
//         if (Auth::attempt(['email' => $email, 'password' => $password])) {
//             $auth = Auth::user();
//             if($auth->role == 0) {
//                 return redirect()->route('admin.dashboard');
//             } else {
//                 return redirect($request->url);
//             }

// if ($auth->role === 0) {
//                 return redirect()->route('admin.users.list');
//             } elseif ($auth->role === 1 && $auth->status === 0) {
//                 return redirect()->route('page.home');
//             } else {
//                 session()->flash('error', 'Tài khoản của bạn chưa được kích hoạt!');
//                 return redirect()->route('auth.login');
//             }

// Auth::user() để lấy thông tin người dùng
