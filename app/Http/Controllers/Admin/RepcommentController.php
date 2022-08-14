<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Remark;
use App\Models\Product;
use App\Models\Repcomment;
class RepcommentController extends Controller
{
    public function rep(Request $request, $remark)
    {
        
        $remarkId = $remark;
        $rep =  new Repcomment();
        $rep->fill($request->all());
        $rep->remark_id = $remarkId;
        $rep->user_id = Auth::user()->id;
        $rep->product_id = $request->input('product_id');
        // $cmt->content = $request->input('content');
        // dd($rep);
        $rep->save();
        return redirect()->back();
    }
    public function index()
    {
        $rep = Repcomment::select('repcomments.*')
            ->with('products', 'users','remarks')
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin.comments.index', [
            'rep' => $rep,
        ]);
    }
}
