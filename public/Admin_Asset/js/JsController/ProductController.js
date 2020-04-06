var product={
	intit:function(){
		product.RegEvents();
	},
	RegEvents: function(){
		var baseurl = document.getElementById('baseurl').value;
		var listpath = [];
		
		if($('input[name=filepath]').val() != null)
		{
			var path = $('input[name=filepath]').val();

    		var img = jQuery('<img class="dynamic" style="width:100px;height:100px">');
    		var path1 = baseurl+path;
            img.attr('src', path1);
            jQuery('#myimg').append(img);
		}
		

		$('input[name=filepath]').change(function () {
			$('#myimg').hide();
		});

		if($('input[name=filepath1]').val() != null)
		{
			var path = $('input[name=filepath1]').val();
			path = path.split(',');
			$.each(path, function(i, item){
				
				var img = jQuery('<img class="dynamic" style="width:100px;height:100px">');
	    		
	    		var path1 = baseurl+item;
	            img.attr('src', path1);
	            jQuery('#myimg1').append(img);
			});
    		
		}
		var i = 0;
		$('input[name=filepath1]').change(function () {
			if(i == 0)
			{
				$('#myimg1').empty();
			}
			
    		var path = $(this).val();

    		//var img = jQuery('<img class="dynamic" style="padding-right:5px;width:100px;height:100px">');
    		
    		var path1 = baseurl+path;
            //img.attr('src', path1);
          //$('#holder2-2').append('<img class="dynamic" src="' + path1 + '" style="padding-right:5px;width:100px;height:100px"/><span class="glyphicon glyphicon-trash"></span>'); 
            //jQuery('#holder2-2').append(img);

		$('<a class="dyn_image add-images'+i+'"><img class="dynamic" src="' + path1 + '" style="padding-right:5px;width:100px;height:100px"/><span id="removeicon'+i+'" onclick="myFunction()" class="glyphicon glyphicon-trash" style="top:65px;right:60px"></span></a>').appendTo('#holder2-2'); 
		
    		listpath.push(path);
    		$('input[name=filepath1]').val(listpath);
    		var temp = $('input[name=filepath1]').val();


    		
    		i++;
		});
		// remove images
$('#holder2-2').on("click",function(e){
    $(e.target).parent().remove();
    if ( !($('#holder2-2').children().length > 0) ) {
      $('input[name=filepath1]').val("");
      listpath = [];
	}

});

	},
}
product.intit();


	