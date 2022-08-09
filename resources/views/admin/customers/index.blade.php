@extends('admin.admin-master')
@section('content-title', 'Danh sách khách hàng đã ')
@section('danh-muc', 'Danh sách khách hàng đã ')
@section('title', 'Danh sách khách hàng đã ')
@section('content')
    <div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)
                        <tr>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                {{ $item->address }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-light btn-sm">
                                    @if ($item->status == 0)
                                        <b>Đang xử lý</b>
                                    @elseif($item->status == 1)
                                        <div style="color:rgb(246, 168, 60)"> <b>Đã xử lý</b></div>
                                    @elseif($item->status == 2)
                                        <div style="color:rgb(168, 222, 52)"> <b>Đang vận chuyển</b></div>
                                    @elseif($item->status == 3)
                                        <div style="color:green"> <b>Thành công</b></div>
                                    @elseif($item->status == 4)
                                        <div style="color:rgb(252, 0, 8)"> <b>Hủy đơn</b></div>
                                    @elseif($item->status == 5)
                                        <div style="color:rgb(255, 4, 4)"> <b> Khách hàng đã hủy đơn hàng</b></div>
                                    @endif
                                </button>
                            </td>

                            <td class="align-middle">
                                <a href="{{ route('customer-cart', $item->id) }}">
                                    <button class="btn btn-warning" style="font-size:9px"href="javascript:;"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">

                                        Xem chi tiết
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div>{{ $customers->links() }}</div>
    @endsection
