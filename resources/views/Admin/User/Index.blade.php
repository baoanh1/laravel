@extends('Admin.Layout._Layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a Class="btn btn-lg btn-success" href="{!! route('admin.user.getcreate') !!}"><i class="fa fa-navicon"></i>Thêm mới </a>
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
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Address</th>
                                    <th class="text-center">Level</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center">{{$item->ID}}</td>
                                        <td class="text-center">{{$item->Name}}</td>
                                        <td class="text-center">{{$item->Phone}}</td>
                                        <td class="text-center">{{$item->Email}}</td>
                                        <td class="text-center">{{$item->Address}}</td>
                                        <td class="text-center">
                                            @if($item->Level == 3)
                                            super user
                                            @elseif($item->Level == 2)
                                            Admin
                                            @else
                                            Member
                                            @endif
                                        <td class="text-center"><a>{{$item->Status?"Kích Hoặt":"Khóa"}}</a></td>
                                        <td class="text-center col-md-2">
                                            <a Class="btn btn-xs btn-danger" href="{{route('admin.user.getdelete', ['id' => $item->ID])}}"><i class="fa fa-edit"></i>Xoa </a>
                                            <a Class="btn btn-xs btn-info" href="{{route('admin.user.getedit', ['id' => $item->ID])}}"><i class="fa fa-times"></i> Sua </a>
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
