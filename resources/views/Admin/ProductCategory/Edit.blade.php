@extends('Admin.Layout._Layout')

@section('content')
@section ('jsFooter')
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
        <script src="Admin_Asset/js/JsController/ProCategoryController.js"></script>
@endsection
    <div class="row">
        <div class="col-lg-12">
            @if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="{{route('admin.catepro.postedit', ['id' => $category->ID])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>name</label>
                                    <input class="form-control" type="text" name="Name" value="{{$category->Name}}">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input class="form-control" type="text" name="MetaTitle" value="{{$category->MetaTitle}}">
                                </div>

                                <div class="form-group">
                                            <label>Anh</label>
                                        <div class="input-group">

                                              <span class="input-group-btn">
                                                <a data-input="thumbnail1" data-preview="holder" class="lfm btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> CHOOSE
                                                </a>
                                              </span>
                                            <input id="thumbnail1" class="form-control" type="" name="filepath" value="{{$category->image}}">
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                        </div>
                                        <div class="show-img">
                                        <div id="myimg" class=""></div>
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="form-control" rows="3" name="MetaDescriptions" value="{{$category->MetaDescriptions }}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="ParentID">
                                        
                                     

                                            <option value="0">Parent category</option>
                                        <?php cate_parent($data, 0, "--",$category->ID);?>
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