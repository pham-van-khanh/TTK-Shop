@extends('client.client-master')
@section('title', 'Thanh Toán')
@section('content-client')
    <div class="container-fluid pt-5">

        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Thông tin thanh toán</h4>
                    @if (Auth::user())
                        
                    
                    <form action="{{route('addCustomer')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Họ và tên</label>
                                <input class="form-control" type="text" name="name" value="{{Auth::user()->name}}">
                               @error('name')
                                   <h5 class="text-danger"> {{$message}} </h5>
                               @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="{{Auth::user()->email}}" placeholder="example@email.com">
                                @error('email')
                                   <h5 class="text-danger"> {{$message}} </h5>
                               @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" type="text" placeholder="0987 654 321">
                                @error('phone')
                                   <h5 class="text-danger"> {{$message}} </h5>
                               @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" type="text" placeholder="123 Street">
                                @error('address')
                                <h5 class="text-danger"> {{$message}} </h5>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Ghi Chú</label>
                                <textarea name="note" id="" cols="112" rows="5">
    
                                </textarea>
                                @error('note')
                                <h5 class="text-danger"> {{$message}} </h5>
                                @enderror
                            </div>
                           
                        </div>
                            <button type="submit" class="btn btn-outline-success"> Gửi</button>
                    </form>
                    @endif
                </div>

            </div>
            @php
                $totalPrice = 0;
            @endphp
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Hóa đơn tạm thời</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">_Sản phẩm_</h5>
                        @foreach ($productsCart as $item)
                                        @php
                                            $price = $item->price_new * $carts[$item->id];
                                            $totalPrice += $price;
                                        @endphp
                            <div class="d-flex justify-content-between">
                                <p>
                                    {{ $item->name }}
                                </p>
                                <p>
                                    {{ number_format($price, 0, ',', '.') }}
                                </p>
                            </div>
                        @endforeach
                        <hr class="mt-0">
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng tiền</h5>
                            <h5 class="font-weight-bold">
                                {{ number_format($totalPrice, 0, ',', '.') }}
                            </h5>
                        </div>
                    </div>
                </div>
                {{-- <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3"><a href="{{route('checkout')}}">
                                Thanh toán
                        </a></button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
