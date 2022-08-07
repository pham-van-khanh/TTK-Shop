
<div class="container-fluid" >
    <div class="row bg-secondary py-2 px-xl-5">
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="{{route('home-page')}}" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">TTK</span>Shop</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form  action="">
                <div class="input-group">
                    <input style="font-size: 80%" type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a style="font-size: 100%" href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span  style="font-size: 70%"class="badge">0</span>
            </a>
            <a style="font-size: 100%" href="{{route('cart')}}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span style="font-size: 70%" class="badge">
                @if(is_null(Session::get('carts')))
                  0 
                  @else
                  {{count(Session::get('carts'))}} 
                @endif
                </span>
            </a>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container-fluid mb-5" style="margin-left:-65px">
    <div class="row border-top px-xl-5">
        
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">TTK</span>Shop</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="ml-auto navbar-nav">
                        <a href="{{route('home-page')}}" class="nav-item nav-link">Home</a>
                        <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>
                        {{-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                            @foreach ($category as $item)
                                 <div class="dropdown-menu rounded-3 m-0">
                                <a href="cart.html" style="font-size: 130%" class="dropdown-item">{{$item->name}}</a>  
                            </div>
                            @endforeach
                           
                        </div> --}}
                        <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
                        <a href="{{route('check-out')}}" class="nav-item nav-link">Checkout</a>
                        @if (empty(Auth::user()))
                        
                        <a href="{{route('login')}}" class="nav-item nav-link">Login</a>
                        <a href="{{route('register-form')}}" class="nav-item nav-link">Register</a>
                        @elseif (Auth::user())
                        {{-- <form action="{{route('user-detail', Auth::user()->id)}}" method="post"> --}}
                            <a href="{{route('user-detail', Auth::user()->id)}}" class="nav-item nav-link"> Hi . {{Auth::user()->name}}</a>
                        {{-- </form> --}}
                      <a href="{{route('logOut')}}" class="nav-item nav-link">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        </a>
                        @endif
                    </div>
                    {{-- <div class="navbar-nav ml-auto py-0" style="margin-left:700px">
                        
                    </div> --}}
            </div>
            </nav>
            
        </div>
    </div>
</div>
