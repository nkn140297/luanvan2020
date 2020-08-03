 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">HỒ SƠ NHÂN VIÊN</h1>
                        <!-- /.col-lg-12 -->
                        @foreach ($nhanvien as $nv)
                        <div class="col">Mã nhân viên : {{$nv->id_nhanvien}}</div>
                        <div class="col">Tên nhân viên: {{$nv->ho_ten}}</div>
                        <div class="col">Giới tính:
                            @if ($nv->gioi_tinh == 1)
                                Nữ
                            @else
                                Nam
                            @endif
                        </div>
                        <div class="col">Ngày sinh: {{$nv->ngay_sinh}}</div>
                        <div class="col">Số CMND:  {{$nv->so_cmnd}}</div>
                        <div class="col">Ngày cấp CMND: {{$nv->ngay_cap_cmnd}}</div>
                        <div class="col">Nơi cấp CMND: {{$nv->noi_cap_cmnd}}</div>
                        {{-- <div class="col">Trạng thái: {{$nv->tbl_vitri->ten_vi_tri}}</div> --}}
                        <div class="col">Thời gian làm việc (tháng): {{$nv->thoi_gian_lam_viec}}</div>
                        <div class="col">Chức vụ: {{$nv->tbl_chucvu->ten_chuc_vu}}</div>
                        <div class="col">Phòng ban: {{$nv->tbl_chucvu->tbl_phongban->ten_phong_ban}}</div>
                        <div class="col">Ảnh đại diện</div>
                        @endforeach
                    </div>
                    <div class="col-lg-6">
                        <h2> HỢP ĐỒNG </h2>
                            @foreach ($hopdong as $hd)
                            <div class="col">Số hợp đồng: {{$hd->id_hopdong}}</div>
                            <div class="col">Tên hợp đồng: {{$hd->ten_hop_dong}}</div>
                            <div class="col">Tên nhân viên: {{$hd->tbl_hosonhanvien->ho_ten}}</div>
                            <div class="col">Ngày lập hợp đồng: {{$hd->ngay_lap_hop_dong}}</div>
                            <div class="col">Ngày nghỉ phép:  {{$hd->ngay_nghi_phep}}</div>
                            <div class="col">Lương cơ bản: {{$hd->luong_co_ban}}</div>
                            <div class="col">Phụ cấp: {{$hd->phu_cap}}</div>
                            <div class="col">Ngày hiệu lực: {{$hd->ngay_hieu_luc}}</div>
                            <div class="col">Ngày hết hạn: {{$hd->ngay_het_han}}</div>
                            <div class="col">Quản lý bởi: {{$hd->nguoi_quan_ly}}</div>
                            @endforeach
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        <!-- ============================================================== -->
        
@endsection