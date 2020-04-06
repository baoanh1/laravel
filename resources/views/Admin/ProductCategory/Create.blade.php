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
                        <form role="form" action="{{route('admin.catepro.postcreate')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>name</label>
                                <input class="form-control" type="text" name="Name" value="{{old('Name')}}">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                            <div class="form-group">
                                <label>Meta title</label>
                                <input class="form-control" type="text" name="MetaTitle" value="{{old('MetaTitle')}}">
                            </div>
                            <div class="form-group">
                                            <label>Anh</label>
                                        <div class="input-group">

                                              <span class="input-group-btn">
                                                <a data-input="thumbnail1" data-preview="holder" class="lfm btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> CHOOSE
                                                </a>
                                              </span>
                                            <input id="thumbnail1" class="form-control" type="hidden" name="filepath" readonly>
                                        </div>
                                        <img id="holder" style="margin-top:15px;max-height:100px;">
                                        </div>
                            <div class="form-group">
                                <label>Seo title</label>
                                <input class="form-control" type="text" name="SeoTitle" value="{{old('SeoTitle')}}">
                            </div>

                            <div class="form-group">
                                <label>Parent ID</label>

                                <select class="form-control" name="ParentID">
                                    <option value="0">Parent category</option>
                                    <?php cate_parent($data)?>
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