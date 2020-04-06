@extends('Admin.Layout._Layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a Class="btn btn-lg btn-success" href="{{route('admin.category.getcreate')}}"><i class="fa fa-navicon"></i>Thêm mới </a>
            <div class="clear"></div>
        </div>

    </div>
    <div class="divider"></div>
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Meta Title</th>
                                    <th class="text-center">Parent ID</th>

                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($category as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center">{{$item->ID}}</td>
                                        <td class="text-center">{{$item->Name}}</td>
                                        <td class="text-center">{{$item->MetaTitle}}</td>
                                        <td class="text-center">{{$item->ParentID}}</td>
                                        <td id="" data-id="{{$item->ID}}" class="col-xs-2 btn-active text-center"><a class="">{{$item->Status?"Kích Hoạt": "Khóa"}}</a></td>
                                        <td class="text-center col-md-2">
                                            <a Class="btn btn-xs btn-danger" href="{{route('admin.category.getdelete', ['id' => $item->ID])}}"><i class="fa fa-edit"></i>Xoa </a>
                                            <a Class="btn btn-xs btn-info" href="{{route('admin.category.getedit', ['id' => $item->ID])}}"><i class="fa fa-times"></i> Sua </a>
                                        </td>


                                        
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
</div>
@endsection
@section('jsFooter')
<script src="Admin_Asset/js/JsController/CategoryController.js"></script>

@endsection