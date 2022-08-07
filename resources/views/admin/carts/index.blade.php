@extends('admin.admin-master')
@section('content-title', 'Giỏ hàng ')
@section('danh-muc', 'Giỏ hàng ')
@section('title', 'Danh sách khách hàng đã ')
@section('content')
    <div>
    </div>
    @php
    $totalPrice = 0;
    @endphp
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                Giỏ hàng của khách hàng : <b>{{ $customers->name }}</b> <br>
                Sđt : <b>{{ $customers->phone }}</b> <br>
                Email : <b>{{ $customers->email }}</b> <br>
                Địa chỉ : <b>{{ $customers->address }}</b> <br>
                Lời nhắn : <b>{{ $customers->note }}</b> <br>
                    @if ($customers->status == 0)
                        <b>Đang xử lý</b>
                    @elseif($customers->status == 1)
                        <div style="color:rgb(246, 168, 60)"> <b>Đã xử lý</b></div>
                    @elseif($customers->status == 2)
                        <div style="color:rgb(168, 222, 52)"> <b>Đang vận chuyển</b></div>
                    @elseif($customers->status == 3)
                        <div style="color:green"> <b>Thành công</b></div>
                    @elseif($customers->status == 4)
                        <div style="color:rgb(252, 0, 8)"> <b>Hủy đơn</b></div>
                    @elseif($customers->status == 5)
                        <div style="color:rgb(255, 4, 4)"> <b> Khách hàng đã hủy đơn hàng</b></div>
                    @endif
                @if ($customers->status == 4 || $customers->status == 5)
                @else
                    <br>
                    Thay đổi trạng thái:
                    <form method="POST" action="{{ route('DaXuLy', $customers->id) }}">
                        @csrf
                        <button class="btn btn-success btn-sm"> Đã xử lý </button>
                    </form>
                    <form method="POST" action="{{ route('DangVanChuyen', $customers->id) }}">
                        @csrf
                        <button class="btn btn-primary btn-sm"> Đang vận chuyển</button>
                    </form>
                    <form method="POST" action="{{ route('ThanhCong', $customers->id) }}">
                        @csrf
                        <button class="btn btn-info btn-sm"> Thành công</button>
                    </form>
                    <form method="POST" action="{{ route('HuyDon', $customers->id) }}">
                        @csrf
                        <button class="btn btn-danger btn-sm"> Hủy đơn hàng </button>
                    </form>
                @endif
                <br>
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên sản phẩm</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ảnh</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá tiền</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Thành tiền
                        </th>

                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">

                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $item)
                        @php
                            $price = $item->price * $item->quantity;
                            $totalPrice += $price;
                        @endphp
                        <tr>
                            <td>
                                {{ $item->products->name }}
                            </td>
                            <td>
                                <img src="{{ asset($item->products->image) }}" width="120" alt="">
                            </td>
                            <td>
                                {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td>
                                {{ $item->quantity }}
                            </td>
                            <td>
                              <b>{{ number_format($price, 0, ',', '.') }}</b>  
                            </td>


                            
                        </tr>
                    @endforeach
                    Tổng tiền: <b>{{ number_format($totalPrice, 0, ',', '.') . ' VNĐ' }}</b>
                </tbody>
            </table>
        </div>
    @endsection
