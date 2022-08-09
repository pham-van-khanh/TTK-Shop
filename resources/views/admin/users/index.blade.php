@extends('admin.admin-master')
@section('content-title', 'List Users')
@section('danh-muc', 'List Users')
@section('title', 'List Users')
@section('content')
@include('admin.alert')

    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Avatar</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quyền</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Active</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            {{-- <a class="btn btn-primary" style="font-size:10px" href="{{ route('product-add') }}"> Add
                                Users</a> --}}
                </th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($users as $item)
                        <tr>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->username }}
                            </td>
                            <td>
                                <img src="{{asset($item->avatar)}}" width="120" alt="">
                            </td>
                            <td>
                                <form action="{{route('admin-role', $item->id)}}" method="POST">
                                    
                                    @if ($item->role == 0)
                                    <button class="btn btn-light"  style="font-size:11px"href="javascript:;" 
                                    class="text-secondary font-weight-bold text-xs" 
                                    data-toggle="tooltip" 
                                    data-original-title="Edit user"> User
                                      </button>
                                      @else 
                                      <button class="btn btn-dark"  style="font-size:11px"href="javascript:;" 
                                    class="text-secondary font-weight-bold text-xs" 
                                    data-toggle="tooltip" 
                                    data-original-title="Edit user"> Admin
                                      </button>
                                    @endif
                                      
                                 @csrf
                                </form>
                            </td>
                            <td>
                                <form action="{{route('admin-status', $item->id)}}" method="POST">
                                    
                                    @if ($item->status == 0)
                                    <button class="btn btn-light"  style="font-size:11px"href="javascript:;" 
                                    class="text-secondary font-weight-bold text-xs" 
                                    data-toggle="tooltip" 
                                    data-original-title="Edit user"> Ko hoạt động
                                      </button>
                                      @else 
                                      <button class="btn btn-dark"  style="font-size:11px"href="javascript:;" 
                                    class="text-secondary font-weight-bold text-xs" 
                                    data-toggle="tooltip" 
                                    data-original-title="Edit user"> Hoạt động
                                      </button>
                                    @endif
                                      
                                 @csrf
                                </form>
                            </td>
                            {{-- <td class="align-middle">
                                <a href="{{ route('admin-edit', $item->id) }}">
                                    <button class="btn btn-warning" style="font-size:9px"href="javascript:;"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                        Sửa
                                    </button>
                                </a>
                                
                            </td> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    @endsection
