@extends('client.auth')
@section('title','Đăng Nhập')
  @section('function','Đăng Nhập')
  @section('content')

  @include('admin.alert')
    <form action="{{route('login-store')}}" method="post" >
      @csrf
       @if ($errors->any())
                 <h5 style="color: red"> {{ $errorMsg }}</h5>
            @endif
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email">
      @error('email')
                    <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
      @enderror
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      @error('password')
                    <h6 style="color: rgb(255, 0, 0)">{{ $message }} </h6>
      @enderror
        <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
      <a class="underlineHover" href="{{route('register-form')}}">  Đăng Ký</a>
    </div>

  @endsection
