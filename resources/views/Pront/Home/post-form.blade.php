 <script src="{{url('Pront/js/post.js')}}"></script>
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/lara2/public/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);


    </script>
 
</script>

<input id="url"  class="" type="hidden" name="geturl" value="{{route('client.getlacation')}}">
<div id="id03" class="modal">
    
        <form class="modal-content1" role="form" action="{{route('client.product.postcreate')}}" method="post" enctype="multipart/form-data">
       {{ csrf_field() }}
        <div class="container">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <input type="text" style="
    height:38px !important" class="text-style" placeholder="Nhâp tiêu đề..." name="Name" required>
            <li class='row'>
                    <div id= "myform" class="col-md-3">
                        <select class="form-control text-style" id="sel1" name="Province">
                            <option>Tỉnh\Thành Phố</option>
                            <option value="0">Tất cả</option>
                            
                                <?php 
                                    $provinces = DB::table('provinces')->get();
                                    ?>
                                    @foreach ($provinces as $key => $value)
                                        <option value="{{$value->id}}" class="province_select">
                                           {{$value->name}}
                                        </option>
                                     @endforeach
                        </select>
                        </div>
                        <div class="col-md-3">
                        <select class="form-control text-style" id="district" name="district_id">
                            <option>Quận\Huyện</option>
                            
                            
                        </select>
                        </div>
                    
                    <div class="col-md-3" >
                        <select class="form-control text-style" id="sel2" name="State">
                            <option>Tình trạng...</option>
                            <option>Mới 100%</option>
                            <option>Như mới</option>
                            <option>Cũ</option>
                            <option>khác(mô tả)</option>
                        </select>
                    </div>
<script>
$(document).ready(function(){
$('#myform').on('change', 'select', function (e) {
        e.preventDefault();
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        var url = $('input[name=geturl]').val();
        $.ajax({
             url:url,
             data:{
                'provinceID':valueSelected,
             },
             type: "GET",
             success: function(data) {
                $('#district').children().remove();
                $('<option value="0">Tất cả</option>').appendTo('#district');
                $.each(data, function (i) {
                    $('<option value="'+data[i].id+'">'+data[i].name+'</option>').appendTo('#district'); 
                });
              
            }
        });
        return false;
    }); 
});
</script>




                    <div class="col-md-3">
                        <input type="text" style="margin-top:-0.5px;
    height:38px !important;    width: 200px;" class="col-md-9 price text-style" placeholder="Giá..." name="Price" required><span class="col-md-3 spanpricce">đ</span>
                    </div>
            </li>
        </div>
       

        <div class="row">
            <span class="note">Lưu ý: Không nên ghi số điện thoại trong bài viết bởi số điện thoại và địa chỉ (nếu có) sẽ được tự động hiển thị dưới dạng ảnh để bảo mật thông tin cho bạn.</span>
        </div>

        <div class="row">
            <div class="form-group col-sm-12 p-4">
                <label class="text-primary">Mô tả:</label>
                <textarea id="mytextarea" class="form-control my-editor" rows="3" name="Detail"></textarea>
                <hr class="half-rule"/>
                <select class="form-control text-style" id="sel3" name="categoryID">
                            <option>Chọn khu vực đăng...</option>
                            
                                <?php 
                                    $procate = DB::table('productcategory')->get();
                                    cate_category($procate);

                                    ?>
                                    
                        </select>
            </div>
            
        </div>
        <div class="col-sm-12">
           
                
                <div class="input-group">
                      
                    <input id="thumbnail2"  class="form-control" type="hidden" name="filepath" readonly>

                </div>
                 <input id="thumbnail22"  class="form-control" type="hidden" name="filepath22" readonly>
        <!-- <img id="holder2-" style="margin-top:15px;max-height:100px;"> -->
        
              
        <div class="show-img">
        <div id="holder2-2" class="full-width-image">

        </div>
       </div>
</div>
        <!-- <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->
        
            <!-- <input type="file" value="Kèm ảnh" placeholder="Chọn ảnh..." class="btn"> -->
            <!-- <div class="" >
                <br>
                    
                    <input type="file" id="files" style="visibility:hidden;" name="files[]" multiple />
                    </div>
                <div class="field" align="left">
                    
                </div>
           -->
           
         
       <div class="ctrlUnit fullWidth submitUnit">
        <dt></dt>
        <div class="form-group flex-v-center">
            <a id="attach" data-input="thumbnail2" data-preview="holder2" class="lfm btn btn-primary text-white">
                <i class="fa fa-picture-o"></i> Kèm Ảnh
            </a>
            <input type="submit" value="Đăng bài" accesskey="s" class="btn btn-primary">

            <input type="submit" value="Hủy" onclick="document.getElementById('id03').style.display='none'"accesskey="s" class="btn btn-primary">
        </div>
       

<div class= "divider"></div>
      <span class="">
    <span>Bạn chưa có tài khoản?</span>
    <a href="" class="registerBtn OverlayTrigger">Đăng ký</a>
  </span>
  <hr class="half-rule"/>
    </div>



</form>
</div>

<script src="{{url('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    var route_prefix = '{{url("laravel-filemanager/")}}';
    
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>


<script>
    $('[class*="lfm"]').each(function() {

        $(this).filemanager('image', {prefix: route_prefix});
    });



$(document).ready(function(){
    var baseurl = document.getElementById('baseurl').value;
    var listpath = new Array();
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
        $('input[name=filepath]').change(function () {
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

        $('<a id="atag" class="dyn_image add-images'+i+'"><img class="dynamic" src="' + path1 + '" style="padding-right:5px;width:100px;height:100px"/><i id="removeicon'+i+'" class="fa fa-trash removeicon"></i></a>').appendTo('#holder2-2'); 
        
            listpath.push(path);
            $('input[name=filepath22]').val(listpath);
            // var temp = $('input[name=filepath1]').val();


            i++;

            $('.removeicon').on('click',function(e){
                $(this).each(function(i){
                    $(this).parent().remove();
                });
                listpath = [];
                if($('.dynamic').length !=0)
                {
                    for(var i =0;i<$('.dynamic').length;i++)
                    {
                        var temp = $('.dynamic').attr("src").replace(baseurl,'');
                         listpath.push(temp);
                         $('input[name=filepath22]').val(listpath);
                        
                    }
                }else{
                    $('input[name=filepath]').val('');
                    $('input[name=filepath22]').val('');
                }
                
            });

        });
        // remove images



        // $('#holder2-2').on('click',function(e){
        //     var modal = new Array();

        //     for (var i = 0; i < listpath.length; i++) {
        //         // var items = $('#removeicon'+i+'');
        //         var modal1 = document.getElementById('#removeicon'+i+'');
        //         modal.push(modal1);
        //         modal.forEach(function(element)
        //         {
        //             if (event.target == element) {
        //                 e.target.parent().remove();
                
        //              }
        //         });
                
                
        //     }
        // });
        
    // get location

    


});
</script>
