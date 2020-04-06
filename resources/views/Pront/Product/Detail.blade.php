@extends('Pront.Layout._Layout')

@section('content')
@section('jsFooter')
<!-- FlexSlider -->
<script src="{{url('Pront/detail')}}/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function () {
        $('.flexslider1').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>


<!-- // Responsiveslides -->
<!-- cart-js -->
<!-- <script src="{{url('Pront/detail')}}/js/minicart.js"></script>
<script>
    hub.render();

    hub.cart.on('new_checkout', function (evt) {
        var items, len, i;

        if (this.subtotal() > 0) {
            items = this.items();

            for (i = 0, len = items.length; i < len; i++) {}
        }
    });
</script> -->
<!-- //cart-js -->
<!-- zoom -->
<script src="{{url('Pront/detail')}}/js/imagezoom.js"></script>
<!-- zoom-->

<!-- start-smooth-scrolling -->
<script src="{{url('Pront/detail')}}/js/move-top.js"></script>
<!-- <script src="{{url('Pront/detail')}}/js/easing.js"></script> -->
<!-- <script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script> -->
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
        };
        */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- <script src="{{url('Pront/detail')}}/js/SmoothScroll.min.js"></script> -->
<!-- //smooth-scrolling-of-move-up -->
<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{url('Pront/detail')}}/js/bootstrap.js"></script>
@endsection
<!-- breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('Pront/detail')}}/index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{url('Pront/detail')}}/women.html">Women's Clothing</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Single Product</li>
    </ol>
</nav>
<!-- //breadcrumbs -->


<!-- Single -->
    <div class="container">
        <div class="row my-sm-5">
            <div class="col-lg-8 single-right-left">
                <div class="grid images_4_of_2">
                    <div class="flexslider1">
                        <ul class="slides">
                            @foreach($imageOfProducts as $item)
                               
                                <li class ="col-xs-4" data-thumb="{{url('')}}/{{$item->image}}">
                                    <div class="thumb-image">
                                        <img src="{{url('')}}/{{$item->image}}" data-imagezoom="true" alt=" " class="img-fluid"> </div>
                                </li>
                            @endforeach
               
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-lg-0 mt-5 single-right-left simpleCart_shelfItem">

                <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle row">
                    <div class="profile-usertitle-name col-sm-8">
                        <li class="li-profile" style=""><i class="icon-class fas fa-user-circle"></i><span style="font-weight: bold;"> 
                        {{$product->users->name}}
                         </span></li>
                        <li class="li-profile"><i class=" icon-class fa fa-low-vision"></i><span>
                            <?php
                                $time = checkStateusers($product->users->last_sign_in_at,$product->users->last_log_out_at);
                                
                                if($time=="active")
                                        {
                                            echo "<span style='color:green'>" ."Đang hoạt động..."."</span>";
                                        }
                        else{
                            echo "Hoạt động ". $time ." trước";
                        }
                                
                            ?>
                            </span></li>
                    </div>
                    <div class="col-sm-4" >
                        <a href="{{route('user.detail.page',['id'=>$product->users->id])}}">
                        <span class="profile-page" style="float:right;">Xem trang</span></a>
                    </div>
                </div>




                <div class="divider clearfix"></div>
                <br>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-md"><i class="phone fa fa-volume-control-phone ">098***</i>Bấm để xem số</button>
                    <a href="{{ route('private.chat.index', ['receiveid'=>$product->users->id, 'proid'=>$product->ID]) }}" type="button" style="width:100%" role="button" class="btn btn-warning inbox"><i class="chat fa fa-comments ">.....</i>Chát với người bán</a>
                </div>
                <div class="divider clearfix"></div>
                <br>
                
             
</div>



                <h3 style="color:red">{{$product->Name}}
                </h3>
                <br>
                <div class="info-product row">
                    <div class="col-sm-4" >
                        <span>
                        <?php
                            $time = gettime($product->CreatedDate);
                            echo "Đăng ".$time." trước";
                                               
                        ?>
                        </span>
                    </div>

                    <div class="col-sm-4">
                        <span> {{$product->state}} </span>
                    </div>

                    <div class="col-sm-4" >
                        <span><i class="icon-class fa fa-map-marker-alt"></i>  {{$product->districts->name}} - {{$product->districts->provinces->name}} </span>
                    </div>
                    

                </div>
                <br>
                <div class="info-address row col">
                    <span><i class="icon-class fa fa-map-marker-alt"></i> địa chỉ người bán - {{$product->users->address}} </span>
                </div>
          
                <div class="caption">

                    <ul class="rating-single">
                        <li>
                            <a href="{{url('Pront/detail')}}/#">
                                <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('Pront/detail')}}/#">
                                <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('Pront/detail')}}/#">
                                <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('Pront/detail')}}/#">
                                <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('Pront/detail')}}/#">
                                <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"> </div>
                    <h6 style="color:red">
                        {{number_format($product->Price, 2)}} đ</h6>
                </div>
                <div class="desc_single">
                    <h5>Mô tả sản phẩm</h5>
                    <p>
                        tincidunt urna vehicula at. Aenean iaculis urna nec pfero scelerisque, ac ullamcorper neque porta.</p>
                </div>
             
                
                <div class="occasion-cart">
                    <div class="chr single-item single_page_b">
                        <form action="#" method="post">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">
                            <input type="hidden" name="hub_item" value="Floral Print Women's Top">
                            <input type="hidden" name="amount" value="18.00">
                            <button type="submit" class="hub-cart phub-cart btn">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                            </button>
                            <a href="{{url('Pront/detail')}}/#" data-toggle="modal" data-target="#myModal1"></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container product-content">
    <div class="row">

        <div class="col-lg-8">
<h3 style="border-bottom: solid 2px #ffc107;">THÔNG TIN SẢN PHẨM</h3>
<br style="border-bottom: solid 1px;">
            <div class="content-product text-justify">
                <p class="text-justify">
                    {!!$product->Detail!!}
                </p>
            </div>
        </div>
        <!-- sidebar -->
        <div class="col-lg-4">
            
                @foreach($proSameCateID as $item)
                <div class="row item-sidebar">
                    <div class="col-sm-4">
                     <a href="" class="image-sidebar-1">
                         <img src="{{url('')}}/{{$item->Image}}" alt="img" class="card-img-left-1" style="margin-left: -16px;width: 120px;height: 120px;">
                     </a>
                 </div>
                     <div class="col-sm-8 content">
                        
                         <a href="" class="small-title">{{$item->Name}}</a>
                         <div class="price-detail-1">
                            
                                <span class="price" style="color:red"> 12000.000 đ<!-- {{$product->Price}} --></span>
                            <div class="row proinfo">
                                <div class="col-sm-6">
                                    <span class="info"> <?php
                            $time = gettime($item->CreatedDate);
                            echo "Đăng ".$time." trước";
                                               
                        ?></span>
                                </div> 
                                <div class="col-sm-6">
                                    <span class="info">{{$item->state}}</span>
                                </div>
               
                                
                        </div>
                        </div>
                         
                     </div>
                </div>
                
                <br>
                @endforeach
            
        </div>
    </div>
</div>
<style >
    /*

CC 2.0 License Iatek LLC 2018
Attribution required

*/


@media (min-width: 768px) and (max-width: 991px) {
  /* Show 3rd slide on md  if col-md-4*/
        .carousel-inner .active.col-md-4.carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -33.3333%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }

}

@media (min-width: 576px) and (max-width: 768px) {
  /* Show 2 slide on md  if col-md-4*/
        .carousel-inner .active.col-sm-6.carousel-item + .carousel-item + .carousel-item {
        position: absolute;
        top: 0;
        right: -50%;  /*change this with javascript in the future*/
        z-index: -1;
        display: block;
        visibility: visible;
    }

}
@media (min-width: 576px) {
  .carousel-item {
  margin-right: 0;
}

    /* show 2 items */
    .carousel-inner .active + .carousel-item {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item {
        transition: none;
    }

    .carousel-inner .carousel-item-next {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    /* left or forward direction */
    .active.carousel-item-left + .carousel-item-next.carousel-item-left,
    .carousel-item-next.carousel-item-left + .carousel-item,
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    } 
    
    /* farthest right hidden item must be abso position for animations */
    .carousel-inner .carousel-item-prev.carousel-item-right {
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        display: block;
        visibility: visible;
    }
    
    /* right or prev direction */
    .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
    .carousel-item-prev.carousel-item-right + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}

/*MD*/
@media (min-width: 768px) {

    /* show 3rd of 3 item slide */
  .carousel-inner .active + .carousel-item + .carousel-item {
        display: block;
    }
 
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
        transition: none;
    }
  
    
    .carousel-inner .carousel-item-next {
      position: relative;
      transform: translate3d(0, 0, 0);
    }
    
    
    /* left or forward direction */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
    
    /* right or prev direction */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}


/*LG 6th*/
@media (min-width: 991px) {

    /* show 4th item */
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }
    
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item {
        transition: none;
    }
    


    
    /* right or prev direction //t - previous slide direction last item animation fix */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}

/*LG 6th*/
@media (min-width: 991px) {

        /* show 5th and 6th item */
    .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
  .carousel-inner .active + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        display: block;
    }

    
  
    .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
  .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
      transition: none;
    }

    
  
  /*show 7th slide for animation when its a 6 slides carousel */
       .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item  + .carousel-item {
        position: absolute;
        top: 0;
        right: -16.666666666%;
        z-index: -1;
        display: block;
        visibility: visible;
  }
  
      /* forward direction > */
    .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
  .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(-100%, 0, 0);
        visibility: visible;
    }
  
      /* prev direction < last item animation fix */
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item,
    .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item + .carousel-item {
        position: relative;
        transform: translate3d(100%, 0, 0);
        visibility: visible;
        display: block;
        visibility: visible;
    }

}
.product-title {
    text-align: center;
    height: 10%;
}
.product-price {
        padding-top: 10%;
    text-align: center;
}
.product-info-container {
    height: 300px;
}
.carousel-control-prev, .carousel-control-next {
    width: 0px;
    margin-top: -17%;
}
</style>
<br>
<h4 style="" class="rad-txt text-capitalize">Sản phẩm liên quan
            </h4>
<br>
<div class="container-fluid">

    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="900000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            
            
            @foreach($proSameCateID as $key => $item)
             
            <div class="<?php if($key ==0){echo 'carousel-item col-12 col-sm-6 col-md-4 col-lg-3 active';}else{echo 'carousel-item col-12 col-sm-6 col-md-4 col-lg-3';}?>">
                <div class="product-info-container">
                    <img class="img-thumbnail img-fluid mx-auto d-block" src="{{url('')}}/{{$item->Image}}" alt="slide 2" style="width: 80%;height: 50%">
                    <div class="product-title">
                        <span>{{$item->Name}}</span>
                    </div>
                    <div class="product-price">
                        <span style="color:red">{{number_format($item->Price,2)}} đ</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <i class="fa fa-chevron-left fa-lg text-muted"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <i class="fa fa-chevron-right fa-lg text-muted"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<br>


<!--// Single -->
    <!-- sign up Modal -->
    <div class="modal fade" id="myModal_btn" tabindex="-1" role="dialog" aria-labelledby="myModal_btn" aria-hidden="true">
        <div class="agilemodal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pt-3 pb-5 px-sm-5">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <img src="{{url('Pront/detail')}}/images/p3.png" class="img-fluid" alt="login_image" />
                        </div>
                        <div class="col-md-6">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="recipient-name1" class="col-form-label">Your Name</label>
                                    <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name1" required="">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-email" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" placeholder=" " name="Email" id="recipient-email" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password1" class="col-form-label">Password</label>
                                    <input type="password" class="form-control" placeholder=" " name="Password" id="password1" required="">
                                </div>
                                <div class="form-group">
                                    <label for="password2" class="col-form-label">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder=" " name="Confirm Password" id="password2" required="">
                                </div>
                                <div class="sub-w3l">
                                    <div class="sub-agile">
                                        <input type="checkbox" id="brand2" value="">
                                        <label for="brand2" class="mb-3">
                                            <span></span>I Accept to the Terms & Conditions</label>
                                    </div>
                                </div>
                                <div class="right-w3l">
                                    <input type="submit" class="form-control" value="Register">
                                </div>
                            </form>
                            <p class="text-center mt-3">Already a member?
                                <a href="{{url('Pront/detail')}}/#" data-toggle="modal" data-target="#exampleModal1" class="text-dark login_btn">
                                    Login Now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //signup modal -->
    <!-- signin Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1" aria-hidden="true">
        <div class="agilemodal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body  pt-3 pb-5 px-sm-5">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <img src="{{url('Pront/detail')}}/images/p3.png" class="img-fluid" alt="login_image" />
                        </div>
                        <div class="col-md-6">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Your Name</label>
                                    <input type="text" class="form-control" placeholder=" " name="Name" id="recipient-name" required="">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input type="password" class="form-control" placeholder=" " name="Password" required="">
                                </div>
                                <div class="right-w3l">
                                    <input type="submit" class="form-control" value="Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- signin Modal -->
    <!-- js -->
    <script src="{{url('Pront/detail')}}/js/jquery-2.2.3.min.js"></script>

    <!-- //js -->
    <!-- smooth dropdown -->
    <script>
        $(document).ready(function () {
            $('ul li.dropdown').hover(function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
            }, function () {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
            });
        });
    </script>
    <!-- //smooth dropdown -->
    <!-- script for password match -->
    <script>
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->



@endsection