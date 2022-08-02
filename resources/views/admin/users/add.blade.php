@extends('admin.admin-master')

@section('title', 'Add Product')

@section('content-title', 'Add Product')
@section('danh-muc', 'Add Product')
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
                    <input type="text" id="form3Example1" value="{{ old('name', $products->name) }}" name="name"
                        class="form-control" />
                    @error('name')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Danh Mục</label>
                    <select name="category_id" class="form-control" id="">
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Giá Cũ</label>
                    <input type="text" id="form3Example1" value="{{ old('price_old', $products->price_old) }}"
                        name="price_old" class="form-control money" />
                    @error('price_old')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Giá Sale</label>
                    <input type="text" id="form3Example1" value="{{ old('price_new', $products->price_new) }}"
                        name="price_new" class="form-control money" />
                    @error('price_new')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Mô Tả Ngắn</label>
            <textarea type="text" id="form3Example3" value="{{ old('description', $products->description) }}" name="description"
                class="form-control" /></textarea>
            @error('description')
                <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Image</label>
            <input type="file" id="image" name="image" class="form-control" />
            @error('image')
                <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
            @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Gallery Image</label>
            <input type="file" id="image" name="gallery[]" multiple class="form-control" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">size</label>
            <input type="hidden" value="1" id="size" name="size" multiple class="form-control" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">tag</label>
            <input type="hidden" value="1" id="t" name="tag" multiple class="form-control" />
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Kích Hoạt</label>
            <br>
            <input type="radio" id="form3Example3" name="active" value="1" /> Public
            <input type="radio" id="form3Example3" name="active" value="0" /> Private
        </div>
        <button type="submit" class="btn btn-danger btn-block mb-4">Tạo mới</button>
        <!-- Register buttons -->
        <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="{{ asset('dist/js/simple.money.format.js') }}"></script>
        <script type="text/javascript">
            $('.money').simpleMoneyFormat();
        </script>
    </form>
@endsection
