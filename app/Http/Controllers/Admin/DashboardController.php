<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    //
    public function index()
    {
        // if (Auth::user()->role == 1) {
            return view('admin.admin-master');
        // }
        // else{
        //     return redirect()->back();
        // }
        
    }
}
