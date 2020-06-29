 @extends('admin.layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH CHỨC VỤ
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã chức vụ</th>
                                <th>Tên chức vụ</th>
                                <th>Thuộc phòng ban</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chucvu as $cv)
                            <tr class="even gradeC" align="center">
                                <td>{{$cv->id_chucvu}}</td>
                                <td>{{$cv->ten_chuc_vu}}</td>
                                <td>{{$cv->tbl_phongban->ten_phong_ban}}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
@endsection