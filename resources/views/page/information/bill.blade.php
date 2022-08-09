@extends('client.client-master')
@section('title', 'Đơn hàng chi tiết')
@section('content-client')

    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="text-left logo p-2 px-5"> <span class="font-weight-bold d-block mt-4">Hello,
                            {{ Auth::user()->name }}</span> </div>
                    <div class="invoice p-5">
                        @php
                            $totalPrice = 0;
                        @endphp
                        <div class="product border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>

                                    @foreach ($orders as $item)
                                        @php
                                            $price = $item->price * $item->quantity;
                                            $totalPrice += $price;
                                        @endphp
                                        <tr>
                                            <td width="20%"> <img src="{{ asset($item->products->image) }}"
                                                    width="90"> </td>
                                            <td width="60%"> <span class="">
                                                    {{ $item->products->name }}
                                                </span>
                                                <div class="product-qty">
                                                    <b class="d-block">
                                                        Số lượng : {{ $item->quantity }}
                                                    </b>

                                                </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right"> <span
                                                        class="text-success">{{ number_format($item->price, 0, ',', '.') . ' VNĐ' }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <table class="table table-borderless">
                            <tbody class="totals">
                                <tr>
                                    <td>
                                        <div class="text-left"> <span class="text-muted">Họ tên người nhận</span> </div>
                                    </td>
                                    <td>
                                        <div class="text-right"> <span>
                                                {{ $customers->name }}
                                            </span> </div>
                                    </td>
                                </tr>
                                <tr class="border-top border-bottom">
                                    <td>
                                        <div class="text-left"> <span class="text-muted">Số điện thoại</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right"> <span class="text-muted">
                                                {{ $customers->phone }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="border-top border-bottom">
                                    <td>
                                        <div class="text-left"> <span class="text-muted">Địa chỉ</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right"> <span class="text-muted">
                                                {{ $customers->address }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-left"> <span class="text-muted">Tổng tiền</span> </div>
                                    </td>
                                    <td>
                                        <div class="text-right"> <span class="text-danger">
                                                {{ number_format($totalPrice, 0, ',', '.') . ' VNĐ' }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-left"> <span class="text-muted">Trạng thái đơn hàng</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-right"> <span class="text-danger">
                                                @if ($customers->status == 0)
                                                    <b style="color:rgb(250, 188, 102)"> Đang xử lý </b>
                                                    <form method="POST" action="{{ route('changeOrdStt', $customers->id) }}">
                                                        @csrf
                                                        <br>
                                                        <button class="btn btn-danger btn-sm"> Hủy đơn</button>
                                                    </form>
                                                @elseif($customers->status == 1)
                                                    <b style="color:rgb(246, 168, 60)"> Đã xử lý</b>
                                                @elseif($customers->status == 2)
                                                    <b style="color:rgb(168, 222, 52)"> Đang vận chuyển</b>
                                                @elseif($customers->status == 3)
                                                    <b style="color:green">Thành công</b>
                                                @elseif($customers->status == 4)
                                                    <b style="color:rgb(252, 0, 8)"> Đơn hàng đã bị hủy </b>
                                                @elseif($customers->status == 5)
                                                    <b style="color:rgb(255, 4, 4)"> Đã hủy đơn
                                                        hàng</b>
                                                @endif
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        Lời nhắn : <br>
                        <p> " {{ $customers->note }} "</p>
                        <p class="font-weight-bold mb-0">Thanks for shopping with us!</p>
                    </div>
                    <div class="d-flex justify-content-between footer p-3"> <span>Need Help? visit our <a href="#">
                                help center</a></span> <span>12 June, 2020</span> </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

    body {
        background-color: #ffe8d2;
        font-family: 'Montserrat', sans-serif
    }

    .card {
        border: none
    }

    .logo {
        background-color: #eeeeeea8
    }

    .totals tr td {
        font-size: 13px
    }

    .footer {
        background-color: #eeeeeea8
    }

    .footer span {
        font-size: 12px
    }

    .product-qty span {
        font-size: 12px;
        color: #dedbdb
    }
</style>
