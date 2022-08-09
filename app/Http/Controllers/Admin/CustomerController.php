<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::select('id', 'name', 'email', 'phone', 'address','status')
            ->orderBy('id', 'DESC')
            ->Paginate(3);
        return view('admin.customers.index', [
            'customers' => $customers,
        ]);
    }
    public function cartDetail(Customer $customers)
    {
        // dd($customers->orders()->get());
        return view('admin.carts.index', [
            'customers' => $customers,
            'orders' => $customers
                ->orders()
                ->orderBy('id', 'DESC')
                ->with('products')

                ->get(),
        ]);
    }
    public function billDetail(Customer $customers)
    {
        return view('page.information.bill', [
            'customers' => $customers,
            'orders' => $customers
                ->orders()
                ->with('products')
                ->get(),
        ]);
    }
    public function getUserDetail(Customer $customers)
    {
        $customers = Customer::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        // dd($customers);
        return view('page.information.user', [
            'customers' => $customers,

        ]);
        // 'orders' => $customers
            //     ->orders()
            //     ->with('products')
            //     ->get(),

    }
    public function cancelOrd($customers)
    {
        $customers = Customer::find($customers);
        if($customers->status == 0 || $customers->status == 1 || $customers->status == 2 || $customers->status == 3){
            $customers->status = 5;
        }
       
        // status = 3 => hủy đơn
        $customers->save();
        return redirect()->back();
    }

    //  status = 0 => đang xử lý
    //  status = 1 => đã xử lý
    //  status = 2 => đang vận chuyển
    //  status = 3 => thành công
    //  status = 4 => admin hủy đơn
    //  status = 5 => khách hủy đơn
    public function DaXuLy($customers)
    {
        $customers = Customer::find($customers);
        if($customers->status == 0 || $customers->status == 2 || $customers->status == 3 ){
            $customers->status = 1;
        }
        // status = 1 => đã xử lý
        $customers->save();
        return redirect()->back();
    }
    public function DangVanChuyen($customers)
    {
        $customers = Customer::find($customers);
        if($customers->status == 0 || $customers->status == 1 || $customers->status == 3 ){
            $customers->status = 2;
        }
        // status = 2 => đang vận chuyển
        $customers->save();
        return redirect()->back();
    }
    public function ThanhCong($customers)
    {
        $customers = Customer::find($customers);
        if($customers->status == 0 || $customers->status == 1 || $customers->status == 2 ){
            $customers->status = 3;
        }
        // status = 3 => thành công
        $customers->save();
        return redirect()->back();
    }
    public function HuyDon($customers)
    {
        $customers = Customer::find($customers);
        if($customers->status == 0 || $customers->status == 1 || $customers->status == 2 || $customers->status == 3 ){
            $customers->status = 4;
        }
        // status = 4 => hủy đơn hàng này đi
        $customers->save();
        return redirect()->back();
    }

}
