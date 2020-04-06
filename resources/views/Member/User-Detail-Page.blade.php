@extends('Pront.Layout._Layout')
@section('content')
<link href="{{url('Pront/css/user-page.css')}}" rel="stylesheet">
<h1>xem trang</h1>
<div class="PaperContainer contactInfo false">
    <div class="PaperInfoWrapper" style="color:rgba(0, 0, 0, 0.87);background-color:#ffffff;transition:all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;box-sizing:border-box;font-family:Verdana, Arial, sans-serif;-webkit-tap-highlight-color:rgba(0,0,0,0);box-shadow:0 1px 2px rgba(0,0,0,.1);border-radius:2px">
        <div class="row">
            <div class="col-xs-12 col-md-6 BasicInfo">
                <div class="AvatarWrapper"><img style="color:#ffffff;background-color:rgb(188, 188, 188);user-select:none;display:inline-flex;align-items:center;justify-content:center;font-size:40px;border-radius:50%;height:80px;width:80px" size="80" alt="CHUYÊN IPHONE LOCK và QUỐC TẾ GIÁ RẺ" src="https://st.chotot.com/imaginary/f54a970db880004fe340a0bb72592995990d11b2/profile_avatar/532416222eade24a4fc7ce76d14663ce07216119/thumbnail?width=160"></div>
                <div class="InfoWrapper"><span class="name">{{$user->name}}</span>
                    <div class="FollowRow">
                        <div><a href="/user/654f2699c787d463df8f8e3dfbfcbf1f/theo-doi"><b>348</b> Người theo dõi</a></div>
                        <div><a href="/user/654f2699c787d463df8f8e3dfbfcbf1f/dang-theo-doi"><b>2</b> Đang theo dõi</a></div>
                    </div>
                    <div class="UltiRow">
                        <button class="MainFunctionButton Follow"><span class="ion-android-add" style="color:#fff;position:relative;font-size:14px;display:inline-block;user-select:none;transition:all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms"></span> &nbsp; Theo dõi</button>
                        <button class="circleButton"><span class="ion-android-more-horizontal" style="color:rgba(0, 0, 0, 0.87);position:relative;font-size:24px;display:inline-block;user-select:none;transition:all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms"></span></button>
                        <div style="display:none"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 ExtraInfo">
                <div class="itemRow sc-dVhcbM dGzVUk"><img src="https://static.chotot.com.vn/storage/marketplace/common/pf_rating_icon.svg">Đánh giá:&nbsp;
                    <div class="ratingInfo  sc-fMiknA kIKSvV">
                        <div class="sc-fBuWsC ddBkqy">3.7</div>
                        <div class="ratingStar undefined"><img alt="rating-star" width="24px" src="https://static.chotot.com.vn/storage/marketplace/common/pf_rating_active_icon.svg" class="sc-gipzik dJdaoE"><img alt="rating-star" width="24px" src="https://static.chotot.com.vn/storage/marketplace/common/pf_rating_active_icon.svg" class="sc-gipzik dJdaoE"><img alt="rating-star" width="24px" src="https://static.chotot.com.vn/storage/marketplace/common/pf_rating_active_icon.svg" class="sc-gipzik dJdaoE"><img alt="rating-star" width="24px" src="https://static.chotot.com.vn/storage/marketplace/common/pf_rating_half_active_icon.svg" class="sc-gipzik dJdaoE"><img alt="rating-star" width="24px" src="https://static.chotot.com.vn/storage/marketplace/common/pf_rating_disable_icon.svg" class="sc-gipzik dJdaoE"></div><a href="/user/654f2699c787d463df8f8e3dfbfcbf1f/chi-tiet-danh-gia">3 đánh giá</a></div>
                </div>
                <div class="itemRow"><img class="" src="/user/static/img/calendar.png" height="16" alt="">Ngày tham gia: &nbsp; <span>15/12/2018</span></div>
                <div class="itemRow"><img class="" src="/user/static/img/location.png" height="20" alt="">Địa chỉ: &nbsp; <span>Số 2 Ngõ 189 Cầu Diễn, Phúc Diễn, Bắc Từ Liêm, Hà Nội</span></div>
                <div class="itemRow"><img class="" src="/user/static/img/chat.png" height="16" alt="">Phản hồi chat: &nbsp; <span>85% (Trong 10 phút)</span></div>
                <div class="itemRow"><img class="" src="/user/static/img/check.png" height="16" alt="">Đã cung cấp: &nbsp;
                    <div class="icon default infoIcon"><img src="/user/static/img/contact/facebook_default.png" height="26"></div>
                    <div class="icon active infoIcon"><img src="/user/static/img/contact/address_active.png" height="26"></div>
                    <div class="icon active infoIcon"><img src="/user/static/img/contact/phone_active.png" height="26"></div>
                    <div class="icon active infoIcon"><img src="/user/static/img/contact/email_active.png" height="26"></div>
                </div>
            </div>
        </div>
    </div>
    <div></div>
</div>
<br>
<div class="clearfix"></div>
<div class="container">
      @foreach($products as $key=>$item)
      <div class="row item item-sidebar">
            <div class="col-sm-3 item-product-index">
                <a href="{{route('client.product.detail.getdetail',['metetitle'=>$item->MetaTitle,'id'=>$item->ID])}}">
                    <img class="img-responsive center" style="border: none; width:70%; margin-left: -7%;height: 134px;" src="{{ url('/')}}/{{$item->Image}}" alt="">
                </a>
            </div>
            <div class="col-sm-9">
                <div class="price-index">
                    <a href="{{route('client.product.detail.getdetail',['metetitle'=>$item->MetaTitle,'id'=>$item->ID])}}" class=""><h4  class="product-title">{{$item->Name}}</h4></a>
                    <span class="product-description">Navigation trong bootstrap 3</span>
                </div>
                <div class="info-detail">
                            
                                <span class="price" style="color:red"> {{number_format($item->Price, 2)}} đ</span>
                            <div class="row proinfo">
                                <div class="col-sm-4">
                                    <span class="info"> 
                                            <?php
                                                $time = gettime($item->CreatedDate);
                                                echo $time." trước";
                                               
                                            ?>
                                    </span>
                                </div> 
                                <div class="col-sm-4">
                                    <span class="info">{{$item->state}}</span>
                                </div>
                                <div class="col-sm-4">
                                    <span class="info"><i class="icon-class fa fa-map-marker-alt"></i> {{$item->districts->name}} - {{$item->districts->provinces->name}}</span>
                                </div>
                        </div>
                        </div>
                <!-- <p>{!! $item->Detail !!}</p> -->
                

            </div>
    
        </div>
        <br>
      @endforeach

     {!! $products->links() !!}
</div>

@endsection
