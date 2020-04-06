@extends('Admin.Layout._Layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" action="{{route('admin.content.postedit', ['id' => $content->ID])}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>name</label>
                                    <input class="form-control" type="text" name="Name" value="{{$content->Name}}">
                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="form-group">
                                    <label>Meta title</label>
                                    <input class="form-control" type="text" name="MetaTitle" value="{{$content->MetaTile}}">
                                </div>

                                <div class="form-group">
                                    <label>Anh</label>
                                    <input type="file" name="file">
                                </div>
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="form-control" rows="3" name="details"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="CategoryID">
                                        <!-- <option value="{{$content->categoryID}}">{{$content->category->Name}}</option>
                                        @foreach ($category as $Data)

                                            <option value="{{$Data->ID}}">{{$Data->Name}}</option>
                                        @endforeach -->
                                        option value="0">Parent category</option>
                                        <?php cate_parent($category, 0, "--",$content->ParentID);?>
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