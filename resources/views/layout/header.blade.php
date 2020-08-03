         <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="{{url('private//')}}">QUẢN LÝ NHÂN SỰ</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        @if(Auth::user()) 
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(isset(Auth::user()->tbl_hosonhanvien->anh_dai_dien))
                                <img src="{{url('upload/arvarta/'.Auth::user()->tbl_hosonhanvien->anh_dai_dien)}}" style="width: 65px;height: 45px;" class="user-avatar-md rounded-circle"></a>
                                @else
                                <img src="{{url('admin_asset/assets/images/avatar-1.jpg')}}" alt="" class="user-avatar-md rounded-circle"></a>
                                @endif
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">Tên: {{Auth::user()->name}}</h5>
{{--                                 
                                @if(isset($chitiet->id_chucvu_moi))
                                    <span class="status"></span><span class="ml-2">{{$chitiet->tbl_chucvu->ten_chuc_vu}}</span>
                                    @else
                                    <span class="status"></span><span class="ml-2">{{Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</span>
                                @endif --}}
                                {{-- @if(isset($phuluc))
                                @foreach($phuluc as $pl)                        
                                        @if($pl->id_loaiphuluc==2)
                                    <span class="status"></span><span class="ml-2">{{$pl->tbl_chitietphuluc->tbl_chucvu->ten_chuc_vu}}: {{$pl->tbl_chitietphuluc->tbl_chucvu->tbl_phongban->ten_phong_ban}}</span>
                                    @endif
                                @endforeach
                                @else
                                <span class="status"></span><span class="ml-2">{{Auth::user()->tbl_hosonhanvien->tbl_chucvu->ten_chuc_vu}}</span>
                                @endif --}}
                                </div>
                                <a class="dropdown-item" href="{{url('private/thongtin/'.Auth::user()->id_nhanvien)}}"><i class="fas fa-user mr-2"></i>Quản lý thông tin</a>
                                <a class="dropdown-item" href="{{url('logout')}}"><i class="fas fa-power-off mr-2"></i>Đăng xuất</a>
                            </div>
                        </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->


        @include('layout.menu')