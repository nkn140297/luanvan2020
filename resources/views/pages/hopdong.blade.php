 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">HỒ SƠ NHÂN VIÊN</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class ="row">
                        <table class="table table-striped table-bordered table-hover" id="data-tables">
                            <thead>
                                <tr align="center">
                                    <th>SỐ HỢP ĐỒNG</th>
                                    <th>LOẠI HỢP ĐỒNG</th>
                                    <th>TÊN NHÂN VIÊN</th>
                                    <th>NGÀY BẮT ĐẦU HỢP ĐỒNG</th>
                                    <th>MỨC LƯƠNG CƠ BẢN</th>
                                    <th>PHỤ CẤP</th>
                                    <th>NGÀY KẾT THÚC HỢP ĐỒNG</th>
                                    <th>NGƯỜI LẬP HỢP ĐỒNG</th>
                                    <th>TRẠNG THÁI</th>
                                    {{-- <th>CHI TIẾT</th>                                 --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hopdong as $hd)
                                <tr class="even gradeC" align="center">
                                    <td>{{$hd->id_hopdong}}</td>
                                    <td>{{$hd->ten_hop_dong}}</td>
                                    <td>{{$hd->tbl_hosonhanvien->ho_ten}}</td>
                                    <td>{{$hd->ngay_bat_dau_hop_dong}}</td>
                                    <td>{{$hd->muc_luong_chinh}}</td>
                                    <td>{{$hd->phu_cap}}</td>
                                    <td>{{$hd->ngay_ket_thuc_hop_dong}}</td>
                                    <td>{{$hd->nguoi_laphd}}</td>
                                    @if((date('m',strtotime($hd->ngay_bat_dau_hop_dong))-(date('m',strtotime($hd->ngay_ket_thuc_hop_dong))))<=2)
                                    <td class="label-danger">Sắp hết hạn </td>
                                    @else
                                    <td class="label-success">Còn hạn</td>
                                    @endif
                                    
                                    {{-- <td><a href="{{url('private/hopdong/'.$hd->id_nhanvien)}}">Xem Chi Tiết</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
@endsection