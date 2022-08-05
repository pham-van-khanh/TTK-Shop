@extends('admin.admin-master')
@section('content-title', 'List Products')
@section('danh-muc', 'List Products')
@section('title', 'List Products')
@section('content')
    <div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price Old</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price New</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh Mục</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Active</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                             <a class="btn btn-primary" style="font-size:10px" href="{{ route('product-add') }}"> Add
                                Products</a> 
                </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <del style="color: red">{{ number_format($item->price_old, 0, ',', '.') }}</del>
                            </td>
                            <td>
                                {{ number_format($item->price_new, 0, ',', '.') }}

                            </td>
                            <td>
                                    {{$item->category->name}}
                            </td>
                            <td>
                                <img src="{{asset($item->image)}}" width="100" alt="">
                            </td>
                            <td>
                                
                                <form action="{{route('product-status', $item->id)}}" method="POST"> 
                                    @if ($item->active == 1)
                                    <button class="btn btn-light"  style="font-size:11px"href="javascript:;" 
                                    class="text-secondary font-weight-bold text-xs" 
                                    data-toggle="tooltip" 
                                    data-original-title="Edit user"> Publish
                                      </button>
                                      @else 
                                      <button class="btn btn-dark"  style="font-size:11px"href="javascript:;" 
                                    class="text-secondary font-weight-bold text-xs" 
                                    data-toggle="tooltip" 
                                    data-original-title="Edit user"> Private
                                      </button>
                                    @endif
                                      
                                 @csrf
                                </form>  
                            </td>
                            
                            <td class="align-middle">
                                <a href="{{ route('product-edit', $item->id) }}">
                                    <button class="btn btn-warning" style="font-size:9px"href="javascript:;"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                        Sửa
                                    </button>
                                </a>
                                <form action="{{ route('product-delete', $item->id) }}" method="POST">
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Bạn có chắc xóa {{ $item->name }} ?')"
                                        style="font-size:9px"href="javascript:;"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                        Xóa
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    @endsection
