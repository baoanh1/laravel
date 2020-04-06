@extends('Admin.Layout._Layout')

@section('content')
    @section ('jsFooter')
        <script>
            CKEDITOR.replace( 'editor1', {
                filebrowserBrowseUrl : '{{asset('/kcfinder/browse.php?opener=ckeditor&type=files')}}',
                filebrowserImageBrowseUrl:'{{asset('/kcfinder/browse.php?opener=ckeditor&type=images')}}',
                filebrowserFlashBrowseUrl : '{{asset('/kcfinder/browse.php?opener=ckeditor&type=flash')}}',
                filebrowserUploadUrl :'{{asset('/kcfinder/upload.php?opener=ckeditor&type=files')}}',
                filebrowserImageUploadUrl: '{{asset('/kcfinder/upload.php?opener=ckeditor&type=images')}}',
                filebrowserFlashUploadUrl : '{{asset('/kcfinder/upload.php?opener=ckeditor&type=flash')}}',
            });


            $('#btnSelectImage').on('click', function (e) {
                e.preventDefault();
                var finder = new CKFinder();
                finder.selectActionFunction = function (url) {
                    $('#txtImage').val(url);
                }
                finder.popup();
            })
        </script>

        @endsection
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="{{route('admin.content.postcreate')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>name</label>
                                            <input class="form-control" type="text" name="Name">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta title</label>
                                            <input class="form-control" type="text" name="MetaTitle">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="3" name="Description"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Anh</label>
                                            <input id="txtImage" type="file" class="form-control"  name="Image">
                                            <a id="btnSelectImage" href="#" class="btn btn-lg btn-info fa fa-upload">Chon anh</a>
                                        </div>

                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea id="editor1" class="form-control" rows="3" name="Detail"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Category name</label>

                                            <select required class="form-control" name="categoryID">
                                                <!-- @foreach ($data as $Data)
                                                <option value="{{$Data->ID}}">{{$Data->Name}}</option>
                                                @endforeach -->

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
