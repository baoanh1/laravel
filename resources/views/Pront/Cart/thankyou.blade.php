@extends('Pront.Layout._Layout')

@section('content')
<div class="col-md-2"></div>
<div class="rows">
	<div class="rows">

		<h2 class="btn btn-success">Thanh toan thanh cong</h2>
		<div class="thank">
            Cảm ơn <b>Bạn {{$order->CustomName}}</b>  đã cho Shop Hoa Mê linh cơ hội được phục vụ.

            <span>Trong 10 phút, nhân viên Shop Hoa Mê linh sẽ <b>gọi điện hoặc gửi tin nhắn xác nhận giao hàng</b> cho bạn.</span>
        </div>
		
	</div>
	<div class="rows">
		<div class="infoorder">
            <div><b>Giao đến:</b> {{$order->ShipAddress}}.</div>
            <div><b>Thời gian nhận hàng dự kiến:</b> Trước {{$datetime['hours']+3}}:00, {{$thu}} ngày {{$datetime['mday']}}/{{$datetime['mon']}}.</div>
            <div><b>Thanh toán tiền mặt khi nhận hàng</b></div>
        	<div><b>Tổng tiền:</b> <strong id="sum">{{$total}} đ</strong></div>
       		<div><b>Yêu cầu khác:</b> </div>
    	</div>

		<p>Trước khi giao nhân viên sẽ gọi cho Bạn để xác nhận. Khi cần trợ giúp vui lòng gọi 1800.1061 (7h30 - 22h)
		Sản phẩm đã mua:</p>
	</div>
	<div class="rows">
		
	</div>
</div>
<div class="col-md-2"></div>
@endsection