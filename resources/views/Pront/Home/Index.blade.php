@extends('Pront.Layout._Layout')
@section('content')

<h3 class="danh-muc">Danh mục mua bán</h3>
<div class="row">
  <div class="col-sm-6">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/cho-xe.png')}}" alt="Lights" style="width:100%">
          <div class="caption-top">
            <p>Xe cộ</p>
          </div>
        </a>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/do-gia-dung.png')}}" alt="Lights" style="width:100%">
          <div class="caption-top">
            <p>Đồ dùng gia đình</p>
          </div>
        </a>
    </div>
    
  </div>
</div>
<div class="row divider"></div>
<br>
<div class="clear-fix"></div>
<div class="row">
  @foreach($category as $item)
  <div class="col-sm-3">
    <div class="thumbnail">
        <a id ="cateID" href="{{route('client.category.pagination.index',$item->ID)}}">
          <img src="{{url($item->image)}}" alt="Lights" style="width:100%">
          <div class="caption-bottom">
            <p>{{$item->Name}} </p>
          </div>
        </a>
    </div>
    
  </div>
  @endforeach
  <!-- <div class="col-sm-3">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/dich-vu-du-lich.png')}}" alt="Lights" style="width:100%">
          <div class="caption-bottom">
            <p>Dịch vuh du lịch</p>
          </div>
        </a>
    </div>
   
  </div> -->
  <!-- <div class="col-sm-3">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/do-van-phong.png')}}" alt="Lights" style="width:100%">
          <div class="caption-bottom">
            <p>Đồ văn phòng</p>
          </div>
        </a>
    </div>
    
  </div>
  <div class="col-sm-3">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/tu-lanh-may-giat.png')}}" alt="Lights" style="width:100%">
          <div class="caption-bottom">
            <p>Tủ lạnh - máy giặt</p>
          </div>
        </a>
    </div>
    
  </div>
  <div class="col-sm-3">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/thoi-trang-do-dung-ca-nhan.png')}}" alt="Lights" style="width:100%">
          <div class="caption-bottom">
            <p>Thời trang - Đồ dùng cá nhân</p>
          </div>
        </a>
    </div>
    
  </div>

  <div class="col-sm-3">
    <div class="thumbnail">
        <a href="#" >
          <img src="{{url('Pront/images/tat-ca-danh-muc.png')}}" alt="Lights" style="width:100%">
          <div class="caption-bottom">
            <p>Tất cả các danh mục</p>
          </div>
        </a>
    </div>
    
  </div> -->

</div>
<br>
<div class="row">
    <div id="pages" class="col-sm-9">
        @yield('product-list-pagination')
    </div>
    <div class="col-sm-3">
        
    </div>
</div>

<br>




@endsection