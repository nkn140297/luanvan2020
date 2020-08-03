 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Thông Tin Lương Tháng {{date('m')}} </h2>
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
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
                <!-- ============================================================== -->
                <!-- validation form -->
                <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                               </div>
                            @endif
                                <div class="col h4"> Tổng lương tháng này của bạn: {{number_format($luong->tong_tien_luong)}} VND</div>
                                <div class="col h4"> Tiền bảo hiểm tháng này (gồm 3 loại bảo hiểm): {{number_format($luong->thue_bao_hiem)}}</div>
                                <div class="col h4"> Thuế thu nhập cá nhân tháng này: {{number_format($luong->thue_thu_nhap)}}</div>
                                <div class="col h4"> Tiền nhận được tháng này: {{number_format($result)}}</div>
                                <form action="{{route('update')}}" method="post">
                                    {{ csrf_field() }}
                                    <input class="btn btn-outline-primary" type="submit" name="" value="Cập Nhật" />
                                </form>
                            {{-- {{ exec('getmac') }}  lay dia chi mac chua duoc--}}
                     </div>
                </div>
                {{-- <div class="col"> Trong tháng {{date('m')}} bạn đã làm được {{round($bangluong->so_gio_lam_viec,1)}} giờ </div> --}}
            </div>
                <!-- ============================================================== -->
                <!-- end validation form -->
                <!-- ============================================================== -->
        </div>
    </div>
</div>

@endsection