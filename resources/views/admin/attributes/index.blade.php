@extends('admin.admin-master')
@section('content-title', 'List Atribute')
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Active</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            <a class="btn btn-primary" style="font-size:10px" href="{{ route('product-add') }}"> Add
                                Products</a>
                        </th>
                    </tr>
                </thead>

            </table>
        </div>
       





    @endsection
