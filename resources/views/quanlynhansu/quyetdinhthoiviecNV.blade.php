 
@extends('layout.index')
@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
       
        <div class="row">
            <div class="col-lg-12 ">
                <h1>QUYẾT ĐỊNH THÔI VIỆC
                </h1>

                <h4 style="margin-left:3% ">Bạn quyết đinh đuổi nhân viên: {{$nhanvien->ho_ten}}, xin hãy nhập lý do!!</h4>

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
                            <form class="needs-validation"  action="{{url('private/quyetdinhthoiviecNV/'.$nhanvien->id_nhanvien)}}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">             
                                            <div class="form-row mb-3">
                                                <label>Nội dung (lý do)</label>
                                                <textarea class="form-control" id="ly_do" name="ly_do" placeholder="" value=""></textarea>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
                                            <button class="btn btn-primary mr-5" type="submit">Đuổi</button>
                                            <button type="reset" class="btn btn-primary">Làm mới</button>
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