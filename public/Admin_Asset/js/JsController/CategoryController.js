var category ={
init: function(){
	category.regevents();
 },
regevents: function(){
$.each($('.btn-active'), function(i,item){
	if($(item).text()=="Khóa")
	{
		$(item).html('Khóa').css('color', 'red');
	}
});

$('.btn-active').off('click').on('click', function(){
	var categoryid = $(this).data('id');
	var btn = $(this);

	$.ajax({
		url:'active',
		type:'get',
		data:{id:categoryid},
		success: function(res){
			if(res.status == true)
			{
				btn.html('Kích Hoạt').css('color', '#337ab7');
				
			}
			else
			{
				btn.html('Khóa').css('color', 'red');
			}
		}
	});

});




 },

}
category.init();