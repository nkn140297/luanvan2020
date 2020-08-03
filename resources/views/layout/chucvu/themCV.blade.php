 
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
                    <h2 class="pageheader-title">Thêm Chức Vụ </h2>
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
                        <h5 class="card-header">Thêm chức vụ</h5>
                        <div class="card-body">
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                {{session('thongbao')}}
                                </div>
                            @endif
                        <form class="needs-validation" method="POST" action="{{url('private/chucvu/them')}}"novalidate>
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                        <!--<div class="valid-feedback">
                                            Looks good!
                                        </div> -->
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                    <label >Phòng Ban</label>
                                                    <select name="id_phongban" class="form-control" style="-webkit-appearance: auto;">
                                                      <option selected value="0" ">Chọn phòng ban</option>
                                                        @foreach($phongban as $pb)
                                                        <option value="{{$pb->id_phongban}}">{{$pb->ten_phong_ban}}</option>
                                                         @endforeach
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <label for="ten_chuc_vu">Tên Chức Vụ</label>
                                            <input type="text" class="form-control" id="ten_chuc_vu" name="ten_chuc_vu" placeholder="Tên chức vụ" value="" required>
                                            </div> 
                                            <div class="form-group col-md-8">
                                                <label for="id_chucvu">Mã Chức Vụ (VD: Nhân viên = NV, Trưởng phòng = TP) </label>
                                            <input type="text" class="form-control" id="id_chucvu" name="id_chucvu" placeholder="Mã Chức vụ" value="" required>
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