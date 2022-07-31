@extends('client.client-master')
@section('title',$product->name)
@section('content-client')
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-7 pb-2">
                <style>
                    .lSSlideOuter .lSPager.lSGallery li.active,
                    .lSSlideOuter .lSPager.lSGallery li:hover {
                        border-radius: 0px;
                        border: 1px solid;
                    }
                </style>
                <ul id="imageGallery">
                    {{-- @dd($images); --}}
                    @foreach ($images as $image)
                         
                        <li  data-thumb="{{asset('/images/products/'.$image->gallery)}}"
                            data-src="{{asset('/images/products/'.$image->gallery)}}">
                           
                            <img width="820" alt="{{$product->name}}" src="{{asset('/images/products/'.$image->gallery)}}" />
                        </li>
                        
                       @endforeach  
                    
                       
                    
                       
                    
                    
                   
                  
                </ul>
            </div>

            <div class="col-lg-5 pb-5">
                <h1 class="font-weight-semi-bold">{{$product->name}}</h1>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h1>{{ number_format($product->price_new, 0, ',', '.').' VNĐ' }}</h1><h2 class="text-muted ml-2"><del style="color: red">{{ number_format($product->price_old, 0, ',', '.').' VNĐ' }}</del></h2>

                <p class="mb-4">
                    {{$product->description}}</p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    {{-- for each ra id của cate --}}
                    {{-- ->id ra của cate data-filter=[cate->id] --}}
                    <form>
                        for 
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"  class="custom-control-input" id="size-1" name="size">
                             {{-- for each ra id của product --}}
                    {{-- ->id ra của product data-filter=[product->id] --}}
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Black</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">White</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Red</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Blue</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Green</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1" id="logout">

                    <div class="comment-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li>
                                <a href="#comments-logout" role="tab" data-toggle="tab">
                                    <h4 class="reviews text-capitalize">Comments</h4>
                                </a>
                            </li>
                            <li>
                                <a href="#add-comment" role="tab" data-toggle="tab">
                                    <h4 class="reviews text-capitalize">Add comment</h4>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="comments-logout">
                                <ul class="media-list">
                                    <li class="media">
                                        <a class="pull-left" href="#">
                                            <img class="media-object img-circle"
                                                src="https://s3.amazonaws.com/uifaces/faces/twitter/dancounsell/128.jpg"
                                                alt="profile">
                                        </a>
                                        <div class="media-body">
                                            <div class="well well-lg">
                                                <h4 class="media-heading text-uppercase reviews">Marco </h4>
                                                <ul class="media-date text-uppercase reviews list-inline">
                                                    <li class="dd">22</li>
                                                    <li class="mm">09</li>
                                                    <li class="aaaa">2014</li>
                                                </ul>
                                                <p class="media-comment">
                                                    Great snippet! Thanks for sharing.
                                                </p>
                                                <a class="btn btn-info btn-circle text-uppercase" href="#"
                                                    id="reply"><span class="glyphicon glyphicon-share-alt"></span>
                                                    Reply</a>
                                                <a class="btn btn-warning btn-circle text-uppercase"
                                                    data-toggle="collapse" href="#replyOne"><span
                                                        class="glyphicon glyphicon-comment"></span> 2 comments</a>
                                            </div>
                                        </div>
                                        <div class="collapse" id="replyOne">
                                            <ul class="media-list">
                                                <li class="media media-replied">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle"
                                                            src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg"
                                                            alt="profile">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="well well-lg">
                                                            <h4 class="media-heading text-uppercase reviews"><span
                                                                    class="glyphicon glyphicon-share-alt"></span> The
                                                                Hipster</h4>
                                                            <ul class="media-date text-uppercase reviews list-inline">
                                                                <li class="dd">22</li>
                                                                <li class="mm">09</li>
                                                                <li class="aaaa">2014</li>
                                                            </ul>
                                                            <p class="media-comment">
                                                                Nice job Maria.
                                                            </p>
                                                            <a class="btn btn-info btn-circle text-uppercase"
                                                                href="#" id="reply"><span
                                                                    class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="media media-replied" id="replied">
                                                    <a class="pull-left" href="#">
                                                        <img class="media-object img-circle"
                                                            src="https://pbs.twimg.com/profile_images/442656111636668417/Q_9oP8iZ.jpeg"
                                                            alt="profile">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="well well-lg">
                                                            <h4 class="media-heading text-uppercase reviews"><span
                                                                    class="glyphicon glyphicon-share-alt"></span> Mary</h4>
                                                            </h4>
                                                            <ul class="media-date text-uppercase reviews list-inline">
                                                                <li class="dd">22</li>
                                                                <li class="mm">09</li>
                                                                <li class="aaaa">2014</li>
                                                            </ul>
                                                            <p class="media-comment">
                                                                Thank you Guys!
                                                            </p>
                                                            <a class="btn btn-info btn-circle text-uppercase"
                                                                href="#" id="reply"><span
                                                                    class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div class="tab-pane" id="add-comment">

                                <form action="#" method="post" class="form-horizontal" id="commentForm"
                                    role="form">
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Comment</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-success btn-circle text-uppercase" type="submit"
                                                id="submitComment"><span class="glyphicon glyphicon-send"></span> Summit
                                                comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
        
        {{-- danh sách sản phẩm --}}
        
                  
    </div>
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
          <div class="col-lg-5 pb-2">
            
          </div>
          <div class="col-lg-5 pb-2">
            <h1>CÓ THỂ BẠN CŨNG BIẾT</h1>
            @include('')
            {{-- @foreach ($products as $item)
                        <div data-filter="[{{$item->id}}]" class="col-lg-4 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="{{asset($item->image)}}" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 style="font-size: 110%" class="text-truncate mb-3">{{$item->name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h5>{{ number_format($item->price_new, 0, ',', '.') }}</h5><h5 class="text-muted ml-2"><del style="color: red">{{ number_format($item->price_old, 0, ',', '.') }}</del></h5>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a style="font-size: 80%" href="{{route('detail',$item->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a  style="font-size: 80%" href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
            @endforeach --}}
            {{-- in ra danh sách sản phẩm --}}
          </div>
          <div class="col-lg-7 pb-2">
            
          </div>
        </div>
      </div>
@endsection
