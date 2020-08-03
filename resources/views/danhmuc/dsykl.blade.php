 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper" >
            <div class="container-fluid dashboard-content">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách {{$loai->loai_y_kien}}</h1>
                    </div>
                    @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                    <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                
                                <div class="card-body">
                    <table class="table table-striped table-bordered" id="data-tables">
                        <thead>
                            <tr align="center">
                                <th>Người gửi ý kiến</th>
                                <th>Nội dung</th>
                                <th>Ngày ý kiến</th>
                                <th>Trạng thái</th>
                                <th>Người duyệt</th>
                                <th>Ngày duyệt</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ykien as $yk) 
                            <tr class="even gradeC" align="center">
                                <td>{{$yk->tbl_hosonhanvien->ho_ten}}</td>
                                <td>{{$yk->ly_do}}</td>
                                <td>{{$yk->created_at}}</td>
                                <td>
                                    @if($yk->trang_thai==0)
                                        Đang Chờ
                                    @else
                                        Đã Duyệt
                                    @endif
                                </td>
                                <td>{{$yk->nguoi_duyet}}</td>
                                <td>
                                    @if($yk->updated_at == $yk->created_at || $yk->nguoi_duyet == Null)
                                    
                                    @else
                                    {{$yk->updated_at}}
                                    @endif
                                </td>
                                <td>
                                <a class="btn btn-outline-primary" href="{{url('private/ykien/danhsach/'.$yk->id_luuykien)}}">Duyệt</a>
                                <a class="btn btn-outline-danger" href="{{url('private/ykien/xoa/'.$yk->id_luuykien)}}">Xóa</a></td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                <!-- /.row -->
            </div>
        </div>
    </div>
</div>
   
</div>
            <!-- /.container-fluid -->
        </div>
@endsection