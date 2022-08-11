@extends('admin.admin-master')
@section('content-title', 'List Comments')
@section('danh-muc', 'List Comments')
@section('title', 'List Comments')
@section('content')
    <div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sản phẩm</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nội dung</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            {{-- <a class="btn btn-primary" style="font-size:10px" href="{{ route('product-add') }}"> Add
                                Comments</a> --}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cmt as $index => $item)
                        <tr>
                           
                        <td>
                            {{ $index + 1 }}. {{$item->users->name}}
                        </td>
                            <td>
                                {{$item->products->name}}
                            </td>
                            <td>
                                {{$item->content}}
                        </td>                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       





    @endsection
