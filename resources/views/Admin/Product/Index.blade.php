@extends('Admin.Layout._Layout')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <a Class="btn btn-lg btn-success" href="{{asset('admin/product/create')}}"><i class="fa fa-navicon"></i>Thêm mới </a>
            <div class="clear"></div>
        </div>

    </div>
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
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php ($i = 0)
                                @foreach ($product as $item)
                                    <tr class="odd gradeX">
                                        <td class="text-center">{{$item->ID}}</td>
                                        <td class="text-center">{{$item->Name}}</td>
                                        <td class="text-center col-xs-2"><img class="col-lg-6" src="{{ url('/')}}/{{$item->Image}}" /></td>
                                        <td class="text-center">

                                            @if($item->categoryID == null)
                                            {{"root"}}
                                            @else
                                            <?php
                                                $procate = DB::table("ProductCategory")->where('ID',$item->categoryID)->first();
                                                echo $procate->Name;
                                                
                                            ?>
                                            @endif
                                            
                                            </td>
                                        
                                         <td class="text-center"><a>{{$item->Status?"Kích Hoặt":"Khóa"}}</a></td>
                                        <td class="text-center col-md-2">
                                            <a Class="btn btn-xs btn-danger detele" href="{{route('admin.product.getdelete', ['id' => $item->ID])}}}"><i class="fa fa-edit"></i>Xoa </a>
                                            <a Class="btn btn-xs btn-info" href="{{route('admin.product.getedit', ['id' => $item->ID])}}"><i class="fa fa-times"></i> Sua </a>
                                        </td>


                                        
                                    </tr>
                                    @php ($i++)
                                    @endforeach


                                </tbody>
                            </table>

                        <div class="pull-right">{{ $product->links() }}</div>
                            <!-- /.table-responsive -->

                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
</div>
@endsection
