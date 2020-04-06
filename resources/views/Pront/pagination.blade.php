@extends('Pront.Home.Index')
@section('product-list-pagination')

<div id="table_data">
    @include('Pront.pagination_data')
   </div>

<script>
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 
  var page = $(this).attr('href').split('page=')[1];
  var urls = window.location.pathname;
  var id = urls.substring(urls.lastIndexOf('/') + 1);
  fetch_data(page, id);
 });

 function fetch_data(page, id)
 {
  $.ajax({
   url:"danh-muc-san-pham/fetch_data?page="+page,
   // url:"{{route('client.category.pagination.detail','id')}}"+page,
   data:{id:id},
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
 }
 
});
</script>
@endsection