 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <!--<div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Sửa Phu</h2>
                    {{-- <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validations</li>
                            </ol>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
         ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
     
            <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3 >Sửa phụ cấp</h3>
                        <p>Vị trí: {{$phucap->tbl_chucvu->ten_chuc_vu}} - {{$phucap->tbl_chucvu->tbl_phongban->ten_phong_ban}}</p>
                        </div>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <form class="needs-validation" method="POST" action="{{url('private/phucap/sua/'.$phucap->id)}}" novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="ten_chuc_vu">Số tiền ăn trưa</label>
                                            <input type="text" class="form-control" id="ten_chuc_vu" name="an_trua" placeholder="Tiền ăn trưa" value="{{$phucap->an_trua}}" required>
                                            </div> 
                                            <div class="form-group col-md-3">
                                                <label for="ten_chuc_vu">Số tiền xăng xe</label>
                                            <input type="text" class="form-control" id="ten_chuc_vu" name="xang_xe" placeholder="Tên xăng" value="{{$phucap->xang_xe}}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ten_chuc_vu">Số tiền trách nhiệm</label>
                                            <input type="text" class="form-control" id="ten_chuc_vu" name="trach_nhiem" placeholder="Tiền trách nhiệm" value="{{$phucap->trach_nhiem}}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="ten_chuc_vu">Số tiền khác(...)</label>
                                            <input type="text" class="form-control" id="ten_chuc_vu" name="khac" placeholder="Tiền khác(nếu có).." value="{{$phucap->khac}}" required>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                            <button class="btn btn-primary" type="submit">Lưu</button>
                                            <button class="btn btn-default" type="reset">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
            </div>
    </div>
</div>

@endsection