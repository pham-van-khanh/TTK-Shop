@extends('client.client-master')
@section('title', 'Giỏ Hàng')
@section('content-client')
    <div class="container-fluid pt-5">
        @include('admin.alert')
        <form action="{{ route('update-cart') }}" method="post">
            @csrf
            <div class="row px-xl-5">
                @if ($productsCart->count() !== 0)

                    <div class="col-lg-8 table-responsive mb-5">
                        <table class="table table-bordered text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Images</th>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            @php
                                $totalPrice = 0;
                            @endphp
                            <tbody class="align-middle">
                                @foreach ($productsCart as $item)
                                    <tr>
                                        @php
                                            $price = $item->price_new * $carts[$item->id];
                                            $totalPrice += $price;
                                        @endphp
                                        <td class="align-middle"><img src="{{ asset($item->image) }}" alt=""
                                                style="width: 50px;"></td>
                                        <td class="align-middle"> {{ $item->name }}</td>
                                        <td class="align-middle">{{ number_format($item->price_new, 0, ',', '.') }}</td>
                                        <td class="align-middle" style="width:200px;">
                                            <div class="input-group quantity mx-auto" style="width:60px;">
                                                <div class="input-group-btn">
                                                    <button style="margin-left: -28px" class="btn btn-danger btn-number"
                                                        data-type="minus" data-field="quant[2]">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="num_product[{{ $item->id }}]"
                                                    style="font-size: 10px"
                                                    class="form-control form-control-sm bg-secondary text-center"
                                                    value="{{ $carts[$item->id] }}">
                                                <div class="input-group-btn">
                                                    <button style="font-size: 14px" class="btn btn-sm btn-primary btn-plus">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            {{ number_format($price, 0, ',', '.') }}
                                        </td>
                                        <td class="align-middle">
                                               <a href="{{ route('delete-cart',$item->id) }}"> <i class="fa fa-times"></i></a>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        

                        <div class="input-group">

                            <input style="min-width: 1px" s type="text" class="form-control p-4"
                                placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary">Apply Coupon</button>
                                <button type="submit" value="update cart" class="btn btn-info btn-lg"> Update Cart</button>
                                <button type="submit" value="update cart" class="btn btn-danger btn-lg"> Delete</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        {{-- <form class="mb-5" action="">
                        <div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div>
                    </form> --}}
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                            </div>
                            {{-- <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">150.000</h6>
                            </div>
                        </div> --}}
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">{{ number_format($totalPrice, 0, ',', '.') }}</h5>
                                </div>
                                    <a class="btn btn-block btn-primary my-3 py-3" 
                                    href="{{route('check-out')}}"> Thanh Toán </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 ">

                            </div>
                            <div class="col-sm-6 col-md-6 ">
                                <div class="text-center">
                                    <h1>GIỎ HÀNG TRỐNGS</h1>
                                    <a class="btn btn-info" href="{{ route('shop') }}"> Quay trở lại cửa hàng</a>
                                </div>
                            </div>

                        </div>
                    </div>

                @endif
            </div>
        </form>
    </div>
@endsection
<style>
    .center {
        width: 150px;
        margin: 40px auto;

    }
</style>
<script>
    $(document).ready(function() {
        $(".add-row").click(function() {
            var name = $("#name").val();
            var email = $("#email").val();
            var markup = "
            ";

            $("table tbody").append(markup);
        });

        // Find and remove selected table rows
        $(".delete-row").click(function() {
            $("table tbody").find('input[name="record"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });
    });
</script>
<script>

    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
