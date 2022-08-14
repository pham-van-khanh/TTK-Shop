@extends('admin.admin-master')
@section('content-title', 'List Category')
@section('title', 'List Category')
@section('danh-muc', 'List Category')
@section('content')
    <div>
    </div>

@include('admin.alert')
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                <a class="btn btn-primary" style="font-size:10px" href="{{ route('category-add') }}"> Add
                                    Category</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>
                                {{ $item['name'] }}
                            </td>
                            <td>
                                <img src="{{ asset($item->image) }}" width="150" alt="">
                            </td>
                                <td>
                                    <form action="{{ route('category-status', $item->id) }}" method="POST">

                                        @if ($item->active == 1)
                                            <button class="btn btn-light" style="font-size:11px"href="javascript:;"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user"> Publish
                                            </button>
                                        @else
                                            <button class="btn btn-dark" style="font-size:11px"href="javascript:;"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Edit user"> Private
                                            </button>
                                        @endif

                                        @csrf
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ route('category-edit', $item->id) }}">
                                        <button class="btn btn-info" style="font-size:9px"href="javascript:;"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            Sửa
                                        </button>
                                    </a>
                                    <form action="{{ route('category-delete', $item->id) }}" method="POST">
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
        <div>{{ $category->links() }}</div>
    @endsection
