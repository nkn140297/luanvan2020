@extends('layout.index')
@section('content')
 <!-- ============================================================== -->

        <!-- /#page-wrapper -->
        <!-- ============================================================== -->


        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH PHÒNG BAN</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="btn-group">
                                        <a class="btn btn-info mb-3" href="{{url('private/phongban/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Tên chức vụ</th>
                                                <th>Thuộc phòng ban</th>
                                                <th>Tiền ăn trưa</th>
                                                <th>Tiền xăng</th>
                                                <th>Tiền trách nhiệm</th>
                                                <th>Khác</th>
                                                <th>Tổng tiền phụ cấp</th>
                                                <th>Tác vụ</th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($phucap as $pc)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$pc->tbl_chucvu->ten_chuc_vu}}</td>
                                                <td>{{$pc->tbl_chucvu->tbl_phongban->ten_phong_ban}}</td>
                                                <td>{{$pc->an_trua}}</td>
                                                <td>{{$pc->xang_xe}}</td>
                                                <td>{{$pc->trach_nhiem}}</td>
                                                <td>{{$pc->khac}}</td>
                                                <td>{{$pc->tong_tien_phu_cap}}</td>
                                                <td><a class="btn btn-warning" href="{{url('private/phucap/sua/'.$pc->id)}}"><i class="fa fa-edit mr-2"></i>Sửa</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection