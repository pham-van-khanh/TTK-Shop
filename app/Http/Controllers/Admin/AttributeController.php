<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        # code...
        return view('admin.attributes.index');
    }
    public function add(Request $request)
    {
        return view('admin.attributes.index');
    }
}
