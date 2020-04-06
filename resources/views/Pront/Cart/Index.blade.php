@extends('Pront.Layout._Layout')

@section('content')



<div class="content">
    <div class="content_top">
        
        <div class="clear"></div>
    </div>
    <div class="section group">
    	@if($cart != null)
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

                
                	@foreach($cart as $item)
                    <tr>
                        <td>{{$item->Product->ID}}</td>
                        <td>{{$item->Product->Name}}</td>
                        <td><img src="{{url('/')}}/{{$item->Product->Image}}" width="100" /></td>
                        <td><input type="number" class="txtQuantity" data-id="{{$item->Product->ID}}" value="{{$item->Quantity}}" min="1" max="99999"/></td>
                        <td>{{number_format($item->Product->Price, 0)}}</td>
                        <td>{{number_format($item->Product->Price * $item->Quantity)}}</td>
                        <td><a href="#" data-id="{{$item->Product->ID}}" class="btn-delete btn btn-lg btn-danger fa fa-times">Xoa</a></td>

                    </tr>
                 
                    @endforeach
               
                </tbody>

            </table>
            @else
            	<h2>khong co san pham nao trong gio</h2>
             @endif

            <button id="btnContinue" class="btn btn-lg btn-info"> tiep tuc mua hang</button>
            <button id="btnUpdate" class="btn btn-lg btn-info"> cap nhat gio hang</button>
            <button id="btnDeleteAll" class="btn btn-lg btn-info">xoa gio hang</button>
            <button id="btnPayment" class="btn btn-lg btn-info"> thanh toan</button>
        

    </div>
        
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