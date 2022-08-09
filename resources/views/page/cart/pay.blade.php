@extends('client.client-master')
@section('title', 'Thanh Toán')
@section('content-client')
    <div class="container-fluid pt-5">
        <form action="{{ route('order') }}" method="post">
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-2">
                    <div class="mb-0">

                    </div>

                </div>
                @php
                    $totalPrice = 0;
                @endphp
                <div class="col-lg-8">

                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Hóa đơn </h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">_Sản phẩm_</h5>
                            @foreach ($productsCart as $index => $item)
                                @php
                                    $price = $item->price_new * $carts[$item->id];
                                    $totalPrice += $price;
                                @endphp
                                <div class="d-flex justify-content-between">
                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                    
                                    <input type="hidden" name="quantity" value="{{$carts[$item->id]}}">
                                    <p>
                                        <b> <?= $index + 1 ?>. </b> {{ $item->name }}
                                    </p>

                                    <p>
                                        <b> Số lượng: {{ $carts[$item->id] }} </b>
                                        <br>
                                        <input readonly style="border:none"
                                           name="total" value="{{ number_format($price, 0, ',', '.') }}">
                                        <style>
                                            input:focus {
                                                outline: 0;
                                            }
                                        </style>
                                    </p>
                                    <input type="text" hidden name="status" value="0">
                                </div>
                            @endforeach
                            <hr class="mt-0">
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <div class="d-flex justify-content-between mt-2">
                                <h5 class="font-weight-bold">Tổng tiền</h5>
                                <h5 class="font-weight-bold">
                                    <input readonly style="border:none"
                                        value="{{ number_format($totalPrice, 0, ',', '.') }}">
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
