jQuery(function($){
	// Get the modal

var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');
var modal1 = document.getElementById('id04');
var modal = new Array();
modal.push(modal1,modal2,modal3);
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {

	modal.forEach(function(element)
	{
		if (event.target == element) {
    		modal.style.display = "none";
    
 		 }
	});
}
jQuery.fn.extend({
    setMenu:function () {
        return this.each(function() {
            var containermenu = $(this);

            var itemmenu = containermenu.find('.xtlab-ctmenu-item');
            itemmenu.click(function () {
                var submenuitem = containermenu.find('.xtlab-ctmenu-sub');
                submenuitem.slideToggle(500);

            });

            $(document).click(function (e) {
                if (!containermenu.is(e.target) &&
                    containermenu.has(e.target).length === 0) {
                     var isopened =
                        containermenu.find('.xtlab-ctmenu-sub').css("display");

                     if (isopened == 'block') {
                         containermenu.find('.xtlab-ctmenu-sub').slideToggle(500);
                     }
                }
            });



        });
    },

});


$('.xt-ct-menu').setMenu();

$('#postbai').on("click",function(){
   var post = document.getElementById('id03');;
   post.style.display = "none";
 });



$("#files").change(function() {
  filename = this.files[0].name
  console.log(filename);
});
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Xóa</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

 // $.ajaxSetup({

 //        headers: {

 //            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

 //        }

 //    });

// $('.signupbtn').on("click",function(e){
//   e.preventDefault();
//    var filter3 = $('#signup');
//    //alert("ggg");
//    var host = "{{url('/')}}";
//     $.ajax({
//          url:filter3.attr('action'),
//          // url:'/loginform',
//          data:filter3.serialize(), // form data
//          type: "POST",
//          success: function(data) {
//           // alert(data.email);
//           setTimeout(function(){ // async
//         window.location.href = 'http://localhost/lara1/public/';
//     }, 50000000);
//           // window.location.href = 'http://localhost/lara1/public/';
//          jQuery("#res").click();
          
          
//          }
//      });
//     return false;
//  });


// End
});



// window.onload = function(){
        
//     //Check File API support
    
// }

