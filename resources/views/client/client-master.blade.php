<!DOCTYPE html>
<html lang="en">

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{asset('dist/img/noithat.jpg')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('dist/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/lightslider.css')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/lightsgallery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('dist/css/prettify.css')}}" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
    <style>
        body{
            font-size: 155%;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    
    <!-- Topbar End -->
@include('client.client-header')

    <!-- Navbar Start -->
    
    <!-- Navbar End -->


    <!-- Featured Start -->
   @yield('content-client')


    <!-- Footer Start -->
    @include('client.client-footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('dist/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('dist/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('dist/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('dist/mail/contact.js')}}"></script>

    <script src="{{asset('dist/js/lightslider.js')}}"></script>
    <script src="{{asset('dist/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('dist/js/prettify.js')}}"></script>

    <script>
        $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:9,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }   
        });  
      });
    </script>
    <!-- Template Javascript -->
    <script src="{{asset('dist/js/main.js')}}"></script>
</body>

</html>