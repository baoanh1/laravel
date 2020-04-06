@extends('Admin.Layout._Layout')

@section('content')
@section ('jsFooter')
   

   
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
        $('#myTextEditor').text('{!!$product->Detail!!}');

    </script>

<script src="{{url('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
        <script>
            var route_prefix = '{{url("laravel-filemanager/")}}';
            
            $('#lfm').filemanager('image', {prefix: route_prefix});
        </script>


        <script>
            $('[class*="lfm"]').each(function() {

                $(this).filemanager('image', {prefix: route_prefix});
            });
        </script>


<script src="Admin_Asset/js/JsController/ProductController.js"></script>




   

@endsection



    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{--{{dd($product)}}--}}
                            <form role="form" action="{{route('admin.product.postedit', ['id' => $product->ID])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>name</label>
                                    <input class="form-control" type="text" name="Name" value="{{$product->Name}}">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>

                                <div class="form-group">
                                    <label>Meta title</label>
                                   
                                    <input class="form-control" type="text" name="MetaTitle" value="{{$product->MetaTitle}}">
                                </div>

                                <div class="form-group">
                                            <label>Anh</label>
                                        <div class="input-group">

                                              <span class="input-group-btn">
                                                <a data-input="thumbnail" data-preview="holder" class="lfm btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> CHOOSE
                                                </a>
                                              </span>
                                            <input id="thumbnail" class="form-control" type="text" name="filepath" readonly value="{{$product->Image}}">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                        </div>
                                        <div class="show-img">
                                        <div id="myimg" class=""></div>
                                       </div>


                                        <div class="form-group">
                                            <label>More Images</label>
                                        <div class="input-group">
                                              <span class="input-group-btn">
                                                <a id="btn-choose" data-input="thumbnail2" data-preview="holder2" class="lfm btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> CHOOSE
                                                </a>
                                              </span>
                                            <input id="thumbnail2"  class="form-control" type="" name="filepath1" readonly value="{{$mergepath}}">
                                        </div>
                                        <img id="holder2-" style="margin-top:15px;max-height:100px;">
                                        
                                        </div>
                                        <div class="show-img">
                                        <div id="holder2-2" class=""></div>
                                       </div>
                                       <div class="show-img1">
                                        <div id="myimg1" class=""></div>
                                       </div>
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea id="myTextEditor" name="Detail" rows="15" class="form-control my-editor" value="{!!$product->Detail!!}">
                                    </textarea>

                                </div>

                                
                                <div class="form-group">
                                            <label>Category name</label>

                                            <select class="form-control" name="categoryID">
                                        
                                     

                                            <!-- <option value="0">Parent category</option> -->
                                        <?php cate_parent($data, 0, "--",$product->procate->ParentID);?>
                                    </select>
                                        </div>
                                <button type="submit" class="btn btn-default">Submit Button</button>
                            </form>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection