var product={
	intit:function(){
		product.RegEvents();
	},
	RegEvents: function(){
		var baseurl = document.getElementById('baseurl').value;
if($('input[name=filepath]').val() != null)
		{
			var path = $('input[name=filepath]').val();

    		var img = jQuery('<img class="dynamic" style="width:100px;height:100px">');
    		var path1 = baseurl+path;
            img.attr('src', path1);
            jQuery('#myimg').append(img);
		}
$('input[name=filepath]').change(function () {
			$('#myimg').remove();
		});

	}

}
product.intit();