@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        {{-- <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH CHỨC VỤ</h1>
                        <a class="btn btn-outline-secondary btn-lg btn-block" href="{{url('private/chucvu/them')}}">Thêm</a>
                        @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                        @endif
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>Mã chức vụ</th>
                                <th>Tên chức vụ</th>
                                <th>Thuộc phòng ban</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chucvu as $cv)
                            <tr class="even gradeC" align="center">
                                <td>{{$cv->id_chucvu}}</td>
                                <td>{{$cv->ten_chuc_vu}}</td>
                                <td>{{$cv->tbl_phongban->ten_phong_ban}}</td>
                                <td><a class="btn btn-outline-primary" href="{{url('private/chucvu/sua/'.$cv->id_chucvu)}}">Sửa</a> / <a class="btn btn-outline-danger" href="{{url('private/chucvu/xoa/'.$cv->id_chucvu)}}">Xóa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div> --}}
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->


        <div id="page-wrapper">
            <div class="container-fluid">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH CHỨC VỤ</h1>
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
                                        <a class="btn btn-info mb-3" href="{{url('private/chucvu/them')}}"><i class="fa fa-plus mr-2"></i>Thêm mới</a>
                                        
                                    </div>
                                    <!-- /.col-lg-12 -->
                                    <table class="table table-striped table-bordered table-hover" id="data-tables">
                                        <thead>
                                            <tr align="center">
                                                <th>Mã chức vụ</th>
                                                <th>Tên chức vụ</th>
                                                <th>Thuộc phòng ban</th>
                                                <th>Tác vụ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($chucvu as $cv)
                                            <tr class="even gradeC" align="center">
                                                <td>{{$cv->id_chucvu}}</td>
                                                <td>{{$cv->ten_chuc_vu}}</td>
                                                <td>{{$cv->tbl_phongban->ten_phong_ban}}</td>
                                                <td><a class="btn btn-warning" href="{{url('private/chucvu/sua/'.$cv->id_chucvu)}}"><i class="fa fa-edit mr-2"></i>Sửa</a> <a class="btn btn-danger" href="{{url('private/chucvu/xoa/'.$cv->id_chucvu)}}"><i class="fa fa-trash mr-2"></i>Xóa</a></td>
                                               
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