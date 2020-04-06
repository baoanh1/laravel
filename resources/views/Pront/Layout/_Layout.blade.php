<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>market</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="Yoga Lite Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="{{url('Pront/css/bootstrap.css')}}">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{url('Pront/css/style.css')}}" type="text/css" media="all" />
    <!-- Style-CSS -->

    <!-- font-awesome-icons -->
    <link href="{{url('Pront/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('Pront/css/index.css')}}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700" rel="stylesheet">
    <script src="{{url('')}}/Admin_Asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="{{url('')}}/Admin_Asset/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('Pront/js/index.js')}}"></script>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <!-- <link href="{{url('Pront/detail')}}/css/bootstrap.css" type="text/css" rel="stylesheet" media="all"> -->
    <!-- shop css -->
    <link href="{{url('Pront/detail')}}/css/shop.css" type="text/css" rel="stylesheet" media="all">
    <!-- Owl-Carousel-CSS -->
    
    <!-- flexslider-css -->
    <link rel="stylesheet" href="{{url('Pront/detail')}}/css/flexslider.css" type="text/css" media="screen" />

    <link href="{{url('Pront/detail')}}/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="{{url('Pront/detail')}}/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="{{url('Pront/detail')}}///fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    






    <!-- //Fonts -->
</head>

<body>
    <input type="hidden" id="baseurl" name="baseurl" value="{{url('/')}}" />
    <!-- //header -->
    <header class="py-sm-3 pt-3 pb-2" id="home">
        <div class="container">

            <!-- nav -->
           <div class="top d-md-flex">
                <div class="col-md-3">
                    <div id="logo">
                    <a href="{{route('index')}}"><span class="fa fa-home"><h6>CHỢ ĐỒ CŨ</h6></span></a>
                </div>
                </div>
                <div class="col-md-2">
                    <!-- <div class="col-md-4"> -->
                    
                        <!-- <form action="#" method="post" class="navbar-form navbar-left">
                            <input class="search" type="search" placeholder="Search..." required="">
                            <button class="form-control btn" value=""><span class="fa fa-search"></span></button>
                        </form> -->
    
                    <!-- </div> -->
                    
                </div>
                <div class="col-md-7">

                    <div class="forms mt-md-0 mt-2">
                        <a href="#" class="btn btn-login"><span class="fa fa-search"></span> Tìm kiếm</a>
                    @if(Auth::check())

                        <div class="menu1 xt-ct-menu">
                            <div class="xtlab-ctmenu-item fa fa-user-circle"></div>
                            <div class="xtlab-ctmenu-sub">
                                <a href="{{route('user.member.showProfile')}}"><i class="fa fa-user fa-fw"></i> {{auth::user()->name}} - ({{auth::user()->roles->first()->name}})</a>
                        
                               <!--  <a href="{{route('user.member.showProfile')}}">Hồ sơ của bạn</a> -->
                                <hr class="style5">
                                <a href="#">Mật khẩu</a>
                                <a href="{{url('logout')}}">Thoát</a>
                            </div>
                        </div>
                        <a href="{{route('get-list-private.chat')}}" id="chat" class="btn"><i class="chat fa fa-comments ">.....</i>chat</a>
                    <!-- a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> 
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{auth::user()->name}}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                      
                        <li class="divider"></li>
                        <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul> -->
                    <!-- /.dropdown-user -->
                    @else


                    <a href="#" onclick="document.getElementById('id01').style.display='block'" class="btn btn-login"><span class="fa fa-user-circle"></span> Đăng Nhập</a>
                    <a href="#" onclick="document.getElementById('id02').style.display='block'" class="btn"><span class="fa fa-pencil-square-o"></span> Đăng Ký</a>
                    
                    @endif
                    <!-- <a href="#" onclick="

                    {{ auth::check() ? "document.getElementById('id03').style.display='block'" : "document.getElementById('id01').style.display='block'" }}"class="btn btn-post"><span class="fa fa-pencil-square-o"></span> Đăng Tin</a> -->

                    <a href="#" id="post" onclick="document.getElementById('id03').style.display='block'" class="btn"><span class="fa fa-pencil-square-o"></span>  Đăng Tin</a>
                </div>

                </div>
            </div>
           
           @include('Pront.Home.login-form') 
           @include('Pront.Home.signup-form') 
           @include('Pront.Home.post-form') 
           @include('Pront.Home.response-register')

            <div>
                    @if(Session::has('notify'))
                        <div class="alert alert-{{Session::get('className')}}">
                        {{Session::get('notify')}}
                        </div>
                    @endif            
                </div>


   <nav class="text-center">
                <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                <input type="checkbox" id="drop" />
                <ul class="menu">
                    <li class="active"><a href="{{route('index')}}"><span>Home</span></a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li>
                        <!-- First Tier Drop Down -->
                        <label for="drop-2" class="toggle">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span>
                        </label>
                        <a href="#">Dropdown <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                        <input type="checkbox" id="drop-2" />
                        <ul>
                            <li><a href="services.html" class="drop-text">Services</a></li>
                            <li><a href="#stats" class="drop-text">Statistics</a></li>
                            <li><a href="#test" class="drop-text">Reviews</a></li>
                            <li><a href="single.html" class="drop-text">More Info</a></li>

                        </ul>
                    </li>

                    <li><a href="events.html">Events</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
            <!-- //nav -->
        </div>
    </header>
    <!-- //header -->

    <div class="main-content" id="home">
        <!-- //header -->
        <div class="container">
           
            @yield('content')

        </div>
        

    </div>

    <!--// mian-content -->
    <!-- //about -->
  <!--   <section class="banner-bottom py-5">
        <div class="container py-md-5">
            <div class="row banner-grids mb-lg-5">


                <div class="col-lg-7 content-right">
                    <h3 class="title-w3pvt">About of Yoga Lite Lite</h3>
                    <h4>We will help to find health, to everyone.</h4>
                    <p class="mt-2 text-left">Integer pulvinar leo id viverra feugiat.Sed porttitor orci vel fermentum elit maximus. Curabitur ut turpis massa in condimentum libero.Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis. </p>
                    <p class="mt-2 text-left">Lorem Ipsum has been the industry's standard since the 1500s. Praesent ullamcorper dui turpis. </p>
                    <div class="row stats text-left mt-5">
                        <div class="col-lg-4 counter">
                            <span class="fa fa-users"></span>
                            <div class="counter-info">
                                <h5>7200+</h5>
                                <p>Members</p>

                            </div>
                        </div>
                        <div class="col-lg-4 counter two">
                            <span class="fa fa-user-md"></span>
                            <div class="counter-info">
                                <h5>1150+</h5>
                                <p>Classes</p>

                            </div>
                        </div>
                        <div class="col-lg-4 counter">
                            <span class="fa fa-diamond"></span>
                            <div class="counter-info">
                                <h5>65+</h5>
                                <p>Experience</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 content-left">
                    <img src="images/ab.jpg" alt="" class="img-fluid">
                </div>

            </div>

        </div>
    </section> -->
    <!-- /about -->
    <!-- /services -->
    
    <!-- /services -->
    <!-- footer -->
    <footer class="footer-content py-5">
        <div class="container-fluid py-lg-5 inner-sec-w3ls">
            <div class="row">
                <div class="col-lg-4 footer-top mt-md-0 mt-sm-5 pr-lg-5">
                    <h2>
                        <a class="navbar-brand" href="index.html">
                            <span class="fa fa-yoast"></span>oga Lite</a>
                    </h2>
                    <p class="my-3">Donec consequat sam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus</p>

                </div>
                <div class="col-lg-3 mt-md-0 mt-5">
                    <div class="footer-w3pvt">
                        <h3 class="mb-3 w3pvt_title">Navigation</h3>
                        <hr>
                        <div class="row">
                            <ul class="col-6 list-info-w3pvt links">

                                <li>
                                    <a href="{{route('index')}}">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="about.html">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="events.html">
                                        Events
                                    </a>
                                </li>
                                <li>
                                    <a href="services.html">
                                        Services
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Contact Us
                                    </a>
                                </li>

                            </ul>
                            <ul class="col-6 list-info-w3pvt links">
                                <li>
                                    <a href="about.html">
                                        Our Mission
                                    </a>
                                </li>
                                <li>
                                    <a href="events.html">
                                        Latest Posts
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Explore
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        Find us
                                    </a>
                                </li>
                                <li>
                                    <a href="events.html">
                                        Privacy Policy
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-lg-2 mt-lg-0 mt-5">
                    <div class="footer-w3pvt">
                        <h3 class="mb-3 w3pvt_title">Contact Us</h3>
                        <hr>
                        <div class="last-w3layouts-contact">
                            <p>
                                <a href="mailto:example@email.com">info@example.com</a>
                            </p>
                        </div>
                        <div class="last-w3layouts-contact my-2">
                            <p>+ 456 123 7890</p>
                        </div>
                        <div class="last-w3layouts-contact">
                            <p>+ 90 nsequursu dsdesdc,
                                <br>xxx Honey State 049436.</p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3 mt-lg-0 mt-5">
                    <div class="footer-w3pvt">
                        <h3 class="mb-3 w3pvt_title">Stay up to date</h3>
                        <hr>
                        <div class="footer-text">
                            <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                            <form action="#" method="post">
                                <input type="email" name="Email" placeholder="Enter your email..." required="">
                                <button class="btn1 btn"><span class="fa fa-paper-plane-o" aria-hidden="true"></span></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- //footer -->
    <div class="copy-right py-2">
        <div class="container-fluid inner-sec-w3ls">
            <div class="row">
                <div class="col-lg-6 copy-w3pvt">
                    <p class="copy-right-grids text-li text-left my-sm-4 my-4">© 2019 Yoga Lite. All Rights Reserved | Design by
                        <a href="http://w3layouts.com/"> W3layouts </a>
                    </p>
                </div>
                <div class="col-lg-5 w3layouts-footer text-right">
                    <ul class="social_section_1info">
                        <li class="mb-2 facebook"><a href="#"><span class="fa fa-facebook"></span> facebook</a></li>
                        <li class="mb-2 twitter"><a href="#"><span class="fa fa-twitter"></span> twitter</a></li>
                        <li class="google"><a href="#"><span class="fa fa-google-plus"></span> google</a></li>
                        <li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span> linkedin</a></li>
                    </ul>
                </div>
                <div class="move-top col-1"><a href="#home" class="move-top"> <span class="fa fa-angle-up" aria-hidden="true"></span></a></div>
            </div>
            <!-- //footer bottom -->
        </div>
    </div>

<script src="{{url('Pront/js/notify-alert-timeout.js')}}"></script>


 @yield('jsFooter')
</body>

</html>
