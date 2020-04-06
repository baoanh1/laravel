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
                                    <form role="form" action="{{route('admin.category.postcreate')}}" method="POST">
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
                                            <label>Seo title</label>
                                            <input class="form-control" type="text" name="SeoTitle">
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