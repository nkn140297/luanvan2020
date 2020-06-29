 
@extends('admin.layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">DANH SÁCH PHÒNG BAN
                            
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã phòng ban</th>
                                <th>Tên phòng ban</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phongban as $pb) 
                            <tr class="even gradeC" align="center">
                                <td>{{$pb->id_phongban}}</td>
                                <td>{{$pb->ten_phong_ban}}</td>
                                
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