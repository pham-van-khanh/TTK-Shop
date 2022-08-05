@extends('admin.admin-master')

@section('title', 'Dashboard')

@section('content')


<div class="row mt-4">
  <div class="col-lg-4 col-md-6 mt-4 mb-4"></div>
  <div class="col-lg-4 col-md-6 mt-4 mb-4">
    @if (Auth::user())
        
    
    <div class="card z-index-2  ">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
        <div class="bg-gradient-warning shadow-success border-radius-lg py-3 pe-1">
          <div class="chart">
         <center>   {{-- <canvas id="chart-line" class="chart-canvas" height="170"> --}}
              <img width="200" src="{{asset(Auth::user()->avatar)}}" alt="{{Auth::user()->name}}">
            {{-- </canvas> --}} </center>
          </div>
        </div>
      </div>
      <div class="card-body">
        <h5 class="mb-0 ">{{Auth::user()->name}}</h5>
        <p class="text-sm "> (<span class="font-weight-bolder">{{Auth::user()->username}}    </span>) -- {{ Auth::user()->email}} </p>
        <hr class="dark horizontal">
        <div class="d-flex ">
          <i class="material-icons text-sm my-auto me-1">schedule</i>
          <p class="mb-0 text-sm"> {{Auth::user()->created_at}} </p>
        </div>
      </div>
    </div>


    @endif
  </div>
  <div class="col-lg-4 mt-4 mb-3">
    
  </div>
</div>
@endsection
