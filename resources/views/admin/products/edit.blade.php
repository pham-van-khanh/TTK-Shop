@extends('admin.admin-master')

@section('title', 'Edit Product')

@section('content-title', 'Edit Product')
@section('danh-muc', 'Edit Product')
@section('content')


    <form action="" method="POST" enctype="multipart/form-data">

        <br>
        @csrf
        @include('admin.alert')
        <div class="form-outline">
            {{-- @if ($errors->any())
                 <h5 style="color: red"> {{ $errorMsg }}</h5>
            @endif --}}
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Tên Sản Phẩm</label>
                    <input type="text" id="form3Example1" value="{{ $product->name}}" name="name" class="form-control" />
                    {{-- @error('name')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                    @enderror --}}
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Danh Mục</label>
                    <select name="category_id" class="form-control" id="">
                        @foreach($categories as $menu)
                                <option value="{{ $menu->id }}" {{ $product->category_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}
                                </option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Giá Cũ</label>
                    <input type="text" value="{{ $product->price_old}}" id="form3Example1" name="price_old" class="form-control" />

                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Giá Sale</label>
                    <input type="text" value="{{ $product->price_new}}" id="form3Example1" name="price_new" class="form-control" />
                    
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Mô Tả Ngắn</label>
            <textarea type="text" id="form3Example3"  name="description" class="form-control" />{{ $product->description }}</textarea>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Image</label>
            <input type="text"  id="image" name="image" class="form-control" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Kích Hoạt</label>
            <br>
            <input type="radio" id="form3Example3" name="active" value="1" {{$product->active == 1 ? 'checked="Publish"':''}}  /> Publish
            <input type="radio" id="form3Example3" name="active" value="0" {{$product->active == 0 ? 'checked="Private"':''}} /> Private
        </div>
        <button type="submit" class="btn btn-danger btn-block mb-4">Cập Nhật</button>
        <!-- Register buttons -->
        <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>

    </form>
@endsection
