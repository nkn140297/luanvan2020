        <div class="header">
                <div class="logo">
                    <a href="trangchu"><img src="https://yoshigroup.jp/wp-content/uploads/2019/06/logo.png" alt=""></a>
                </div>
                <div class="navigate" style="margin-top: 25px;">
                    <ul>
                        <li class="{{Request::is('gioithieuchung') ? 'active':null}}"><a href="gioithieuchung">Giới Thiệu Chung</a></li>
                        <li><a href="trangchu">Lĩnh Vực Kinh Doanh</a></li>
                        <li><a href="trangchu">Dự Án</a></li>
                        {{-- <li><a href="#">Công Ty Thành Viên</a></li> --}}
                        <li class="{{Request::is('tintucsukienall') ? 'active':null}}"><a href="tintucsukienall">Tin Tức Sự Kiện</a></li>
                        <li class="{{Request::is('lienhe') ? 'active':null}}"><a href="lienhe">Liên hệ</a></li>
                        {{-- <ul style="display: inline-grid;">  --}}
                        @if((Auth::user()))
                        <li class="{{Request::is('nguoidung') ? 'active':null}}"><a href="nguoidung">User: <img src="https://simpleicon.com/wp-content/uploads/user1.png" style="width: 17px;"> {{Auth::user()->name}}</a></li>
                            <li class="{{Request::is('dangxuat') ? 'active':null}}"><a href="dangxuat" style="margin-left: 50px;">Đăng Xuất</a></li>
                        {{-- </ul> --}}
                        @else
                        <ul style="display: flex;"> 
                        <li class="{{Request::is('dangnhap') ? 'active':null}}"><a href="dangnhap">Đăng Nhập</a></li>
                        <li class="{{Request::is('dangky') ? 'active':null}}"><a href="dangky">Đăng Ký</a></li>
                    </ul>
                        @endif
                    </ul>
                </div>
        </div>