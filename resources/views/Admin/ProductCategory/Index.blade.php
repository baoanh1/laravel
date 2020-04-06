@extends('Admin.Layout._Layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a Class="btn btn-lg btn-success" href="{{ route('admin.catepro.getcreate') }}"><i class="fa fa-navicon"></i>Thêm mới </a>
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
                                    <th class="text-center">Image</th>
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
                                        <td class="text-center col-xs-2"><img class="img-thumbnail" src="{{url($item->image)}}"></td>
                                        <td class="text-center">{{$item->MetaTitle}}</td>

                                        <td class="text-center">
                                            @if($item->ParentID == 0)
                                            {{"root"}}
                                            @else
                                            <?php

                                                $parent = DB::table("ProductCategory")->where('ID',$item->ParentID)->first();
                                                echo $parent->Name;
                                            ?>
                                            @endif
                                        </td>

                                        <td class="text-center"><a>{{$item->Status?"Kích Hoặt":"Khóa"}}</a></td>
                                        <td class="text-center col-md-2">
                                            <a Class="btn btn-xs btn-danger" href="{{  route('admin.catepro.getdelete', ['id' => $item->ID])}}"><i class="fa fa-edit"></i>Xoa </a>
                                            <a Class="btn btn-xs btn-info" href="{{route('admin.catepro.getedit', ['id' => $item->ID])}}"><i class="fa fa-times"></i> Sua </a>
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
