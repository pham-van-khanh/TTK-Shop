<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //

    public function index()
    {
        $this->data['errorMsg'] = 'Đăng nhập lỗi';
        return view('page.login.login', ['title' => 'Đăng Nhập'], $this->data);
    }
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        // $url = $request->url();
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $auth = Auth::user();
            if ($auth->status == 1) {
                if ($auth->role == 1) {
                    return redirect()->route('admin');
                } else {
                    return redirect()->route('home-page');
                }
            } else {
                Session::flash('error', 'Tài khoản của bạn đã bị khóa');
                Auth::logout();
                return redirect()->back();
            }
        } else {
            Session::flash('error', 'Email hoặc Password không chính xác');
            return redirect()->back();
        }
    }

    public function register(User $users)
    {
        $this->data['errorMsg'] = 'Đăng ký lỗi';
        return view('page.login.register', $this->data, compact('users'));
    }
    public function handleRegister(LoginRequest $request, User $users)
    {
        if ($request->input('re_password') == $request->input('password')) {
            $users = new User();
            $password = $request->input('password');
            $users->fill($request->all());
            if ($request->hasFile('avatar')) {
                $image = $request->avatar;
                $imageName = $image->hashName();
                $imageName = $request->code . '_' . $imageName;
                $users->avatar = $image->storeAs('images/users', $imageName);
            } else {
                $users->avatar = '';
            }
            $users->password = Hash::make($password);
            $users->status = 1;
            $users->save();
        } else {
            Session::flash('error', 'Password Confirm không chính xác');
            return redirect()->back();
        }
        Auth::user($users);
        return redirect()->route('home-page');
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
    public function list()
    {
        $users = User::select('id', 'name', 'username', 'role', 'status', 'avatar')->paginate(3);
        return view('admin.users.index', ['users' => $users]);
    }

    public function changeRol($user)
    {
        $user = User::find($user);
        if ($user->role == 1) {
            $user->role = 0;
        } else {
            $user->role = 1;
        }
        $user->save();
        Session::flash('success', 'Cấp quyền thành công');
        return redirect()->route('users');
    }
    public function changeStt($user)
    {
        $user = User::find($user);
        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        Session::flash('success', 'Cập nhật trạng thái thành công');
        return redirect()->route('users');
    }
    public function show(User $users)
    {
        return view('admin.users.edit',[
            'users' =>$users
        ]);
        
    }
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        $users->fill($request->all());
        if ($users) {
            if ($users->avatar != null) {
                if ($request->hasFile('avatar')) {
                    $image = $request->avatar;
                    $imageName = $image->hashName();
                    $imageName = $request->code . '_' . $imageName;
                    $users->avatar = $image->storeAs('images/users', $imageName);
                } else {
                    $users->avatar = '';
                }
            }
        }
        $users->save();
        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('users');
        // } 
        // catch (\Exception $err) {
        //     Session::flash('error', 'Có lỗi khi cập nhật');
        //     return false;
        // }
        // return true;
    }
    public function destroy(Request $request,$id)
    {
        $request = User::destroy($id);
        return redirect()->back();
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
