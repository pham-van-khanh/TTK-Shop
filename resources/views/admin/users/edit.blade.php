@extends('admin.admin-master')

@section('title', $users->name)

@section('content-title', 'Edit User')
@section('danh-muc', 'Edit User')
@section('content')

  
    <form action="{{route('admin-update',$users->id)}}" method="POST" enctype="multipart/form-data">

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
                    <label class="form-label" for="form3Example1">Họ và tên</label>
                    <input type="text" id="form3Example1" value="{{ $users->name }}" name="name" class="form-control" />
                    {{-- @error('name')
                        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
                    @enderror --}}
                </div>
            </div>
           
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Username</label>
                    <input type="text" value="{{ $users->username}}" id="form3Example1" name="username" class="form-control" />

                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Email</label>
                    <input type="text" value="{{ $users->email}}" id="form3Example1" name="email" class="form-control" />
                    
                </div>
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Code</label>
            <input type="text"  id="avatar" value="{{ $users->code}}" name="code" class="form-control" />

        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Ảnh đại diện</label>
            <input type="file"  id="avatar" name="avatar" class="form-control" />
            <img src="{{asset($users->avatar)}}" width="100" alt="">

        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Kích Hoạt</label>
            <br>
            <input type="radio" id="form3Example3" name="active" value="1" {{$users->active == 1 ? 'checked="Private"':''}}  /> Private
            <input type="radio" id="form3Example3" name="active" value="0" {{$users->active == 0 ? 'checked="Publish"':''}} /> Publish
        </div>
        <button type="submit" class="btn btn-danger btn-block mb-4">Cập Nhật</button>
        <!-- Register buttons -->
        <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>

    </form>
@endsection
