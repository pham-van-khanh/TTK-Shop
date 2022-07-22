@extends('admin.admin-master')
@section('content-title','List Products')
@section('title','List Products')
    @section('content')
    <div>
        </div>
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Products</h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Amount</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                {{-- <a class="btn btn-primary" style="font-size:10px" href="{{route('product-add')}}"> Add Products</a> --}}
                              </th>
                            </tr>
                          </thead>
                          {{-- <tbody>
                            @foreach ($products as $item)
                            <tr>
                              <td>
                                {{$item['name']}}
                              </td>
                              <td>
                                {{$item['price']}}
                              </td>
                              <td>
                                {{$item['amount']}}
                              </td>
                              <td>
                                {{$item['img']}}
                              </td>
                              <td class="align-middle">
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                  Edit
                                </a>
                              </td>
                            </tr>
                            @endforeach
                            
                          </tbody> --}}
                    </table>
                  </div>
                
          @endsection