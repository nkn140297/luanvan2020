
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
                    <h2 class="pageheader-title">Chấm công tăng ca ngày {{date('d/m')}} </h2>
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
                            @if (isset($tangca->check_in))
                                @if(isset($tangca->thoi_gian_lam))
                                    <div class="h1">Đã chấm công hôm nay rồi</div>
                                @else
                                    <form action="{{route('checkout_tangca')}}" method="post">
                                        {{ csrf_field() }}
                                        <input class="btn btn-outline-danger" type="submit" name="" value="Checkout" />
                                    </form>
                                @endif  
                            @else
                            {{-- @if(date('Y-m-d H:i:s') > date('Y-m-d 18:00:00') && date('Y-m-d H:i:s') < date('Y-m-d 08:00:00',strtotime('+1 days'))) --}}
                            <form action="{{route('checkin_tangca')}}" method="post">
                                {{ csrf_field() }}
                                <input class="btn btn-outline-primary" type="submit" name="" value="Checkin" />
                            </form>
                            {{-- @else
                            <div class="h2"> Chưa Đến Giờ Điểm Danh </div>
                            <div class="h3"> Cổng điểm danh mở ra từ 8h đến 10h sáng </div> --}}
                            {{-- @endif --}}
                            @endif
                            
                            {{-- {{ exec('getmac') }}  lay dia chi mac chua duoc--}}
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