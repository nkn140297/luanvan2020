 
@extends('layout.index')
@section('content')
 <!-- ============================================================== -->
       <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">BẢO HIỂM</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @foreach ($baohiem as $bh)
                       
                            <div class="col ">Số Bảo Hiểm Y Tế: {{$bh->so_bhyt}}</div>
                            <div class="col">Ngày cấp BHYT: {{$bh->ngay_cap_bhyt}}</div>
                            <div class="col">Nơi cấp BHYT: {{$bh->noi_cap_bhyt}}</div>
                     
                        
                            <div class="col ">Số Bảo Hiểm Xã Hội: {{$bh->so_bhxh}}</div>
                            <div class="col">Ngày cấp BHXH: {{$bh->ngay_cap_bhxh}}</div>
                            <div class="col">Nơi cấp BHXH: {{$bh->noi_cap_bhxh}}</div>
                        
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