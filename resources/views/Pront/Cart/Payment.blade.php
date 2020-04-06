@extends('Pront.Layout._Layout')

@section('content')



<div class="content">
    <div class="content_top">

        <div class="clear"></div>
    </div>
    <div class="section group">
        @if ($cart != null)
            <table class="table">
                <thead>
                    <tr>
                        <td>ma san pham</td>
                        <td>ten SP</td>
                        <td>Anh Sp</td>
                        <td>So luong</td>
                        <td>don gia</td>
                        <td>thanh tien</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($cart as $item)
                    <tr class="odd gradeX">
                        <td class="text-center">{{$item->Product->ID}}</td>
                        <td class="text-center">{{$item->Product->Name}}</td>
                        <td class="text-center"><img src="{{url('/')}}/{{$item->Product->Image}}" width="100" /></td>
                        <td class="text-center"><input type="number" class="txtQuantity " data-id="{{$item->Product->ID}}" value="{{$item->Quantity}}" /></td>
                        <td class="text-center">{{number_format($item->Product->Price)}}</td>
                        <td class="text-center">{{number_format($item->Product->Price * $item->Quantity)}}</td>
                        <td class="text-center"><a href="#" data-id="{{$item->Product->ID}}" class="btn-delete btn btn-lg btn-danger fa fa-times">Xoa</a></td>

                    </tr>
                    @endforeach

                </tbody>

            </table>
        @endif

    </div>
    <form role="form" action="{{url('/')}}/thanh-toan" method="post" enctype="multipart/form-data">
        {{ csrf_field()}}
        <div class="section group">
            <div class="col-md-4">
                <div class="form-group">
                    <label>nguoi nhan</label>
                    <input name="shipName" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Dien thoai</label>
                    <input name="mobile" class="form-control" />
                </div>
                <div class="form-group">
                    <label>dia chi</label>
                    <input name="address" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" />
                </div>
                <button type="submit" class="btn btn-lg btn-info">thanh toan</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('jsFooter')
<script src="Pront_Asset/js/JsController/cart1Controller.js"></script>
<script>

	// $('#btnUpdate').off('click').on('click', function () {
	// 	var listProduct = $('.txtQuantity').val();
		
	// $.ajax({
	// 			url: "update",
 //                type: "get",
 //                data: {id:listProduct},
 //                success: function(response){ // What to do if we succeed
 //                    if(response == 1)
 //                    alert(response); 
 //                }
 //            })
	// });
</script>

@endsection