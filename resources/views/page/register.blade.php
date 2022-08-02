@extends('client.auth')
@section('title', 'Đăng Ký')
@section('function', 'Đăng Ký Tài Khoản')
@section('content')
    <form action="{{ route('register') }}" method="POST">
        @csrf
        @include('admin.alert')
        @if ($errors->any())
            <h5 style="color: red"> {{ $errorMsg }}</h5>
        @endif
        <input type="text" class="fadeIn second" name="name" placeholder="Name">
        @error('name')
            <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
        @enderror
        <input type="text" class="fadeIn second" name="username" placeholder="Username">
        @error('username')
            <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
        @enderror
        <input type="text" class="fadeIn second" name="email" placeholder="Email">
        @error('email')
            <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
        @enderror
        <input type="text" class="fadeIn second" name="code" placeholder="Code">
        @error('code')
        <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
        @enderror
        <input type="hidden" value="0" class="fadeIn second" name="role" placeholder="">
        <input type="hidden" value="0" class="fadeIn second" name="status" placeholder="Email">

        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
        @error('password')
            <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
        @enderror
        <input type="text" id="password" 
    class="fadeIn third" name="re_password" placeholder="Password Confirm">
        <input type="submit" class="fadeIn fourth" value="Đăng Ký">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
        <a class="underlineHover" href="{{ route('login') }}">Login</a>
    </div>
@endsection
