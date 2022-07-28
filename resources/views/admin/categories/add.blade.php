@extends('admin.admin-master')

@section('title', 'Add Category')
@section('content-title', 'Add Category')
@section('danh-muc', 'Add Category')
@section('content')


    <form action="" method="POST" enctype="multipart/form-data">
        <br>
        @csrf
        @include('admin.alert')
        <div class="form-outline">
            @if ($errors->any())
                 <h5 style="color: red"> {{ $errorMsg }}</h5>
            @endif
        </div>
        
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Tên Danh Mục</label>
                    <input type="text" id="form3Example1" name="name" class="form-control" />
                    @error('name')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                    @enderror
                </div>
            </div>
            
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Mô Tả Ngắn</label>
            <textarea type="text" id="form3Example3" name="description" class="form-control" /></textarea>
            @error('description')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
            @enderror
        </div>
        
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Image</label>
            <input type="file" id="form3Example3" name="image" class="form-control" />
            @error('image')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                @enderror
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Kích Hoạt</label>
            <br>
            <input type="radio" id="form3Example3" name="active" value="1"  /> Publish
            <input type="radio" id="form3Example3" name="active" value="0"  /> Private
        </div>
        <button type="submit" class="btn btn-danger btn-block mb-4">Tạo mới</button>
        <!-- Register buttons -->
        <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>

    </form>
@endsection
