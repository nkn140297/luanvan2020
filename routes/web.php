<?php



//-------------------------- Login --------------------------------------
Route::get('login','NhanVienController@getDangnhap')->name('dangnhap');
Route::post('login','NhanVienController@postDangnhap');
Route::get('logout','NhanVienController@getDangXuatAdmin');
Route::group(['prefix'=>'private','middleware'=>'adminLogin'],function(){
Route::get('/', 'NhanVienController@getview'); 
//-------------------------- Tin tuc--------------------------------------
Route::group(['prefix'=>'theloai'],function(){

    //admin/theloai/danhsach
    Route::get('danhsach','TheLoaiController@getDanhSach');
    Route::get('sua/{id}','TheLoaiController@getSua');
    Route::post('sua/{id}','TheLoaiController@postSua');
    Route::get('them','TheLoaiController@getThem');
    Route::post('them','TheLoaiController@postThem');

    Route::get('xoa/{id}','TheLoaiController@getXoa');
});
Route::group(['prefix'=>'loaitin'],function(){
    //admin/loaitin/them
    Route::get('danhsach','LoaiTinController@getDanhSach');
    Route::get('sua/{id}','LoaiTinController@getSua');
    Route::post('sua/{id}','LoaiTinController@postSua');

    Route::get('them','LoaiTinController@getThem');
    Route::post('them','LoaiTinController@postThem');

    Route::get('xoa/{id}','LoaiTinController@getXoa');
});
Route::group(['prefix'=>'tintuc'],function(){
    //admin/tintuc/them
    Route::get('danhsach','TinTucController@getDanhSach');

    Route::get('sua/{id}','TinTucController@getSua');
    Route::post('sua/{id}','TinTucController@postSua');
    
    Route::get('them','TinTucController@getThem');
    Route::post('them','TinTucController@postThem');

    Route::get('xoa/{id}','TinTucController@getXoa');	
});
    Route::group(['prefix'=>'comment'],function(){
    Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');	
});
Route::group(['prefix'=>'slide'],function(){
    Route::get('danhsach','SlideController@getDanhSach');

    Route::get('sua/{id}','SlideController@getSua');
    Route::post('sua/{id}','SlideController@postSua');
    
    Route::get('them','SlideController@getThem');
    Route::post('them','SlideController@postThem');

    Route::get('xoa/{id}','SlideController@getXoa');	
});










//--------------------------- Phòng ban ---------------------------
Route::group(['prefix' => 'phongban'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachPB');
    //Route::get('danhsach', ['uses'=>'DanhmucController@getDanhSachPB', 'as'=>'danhsach.index']);
    //---------------------Form Thêm phòng ban -----------------------------------
    Route::get('them','PhongbanController@getThemPB'); 
    Route::post('them','PhongBanController@postThemPB');

    Route::get('sua/{id_phongban}','PhongBanController@getSuaPB');
    Route::post('sua/{id_phongban}','PhongBanController@postSuaPB'); 

    Route::get('xoa/{id_phongban}','PhongBanController@getXoaPB');
    Route::get('bab','PhongBanController@tesT');
});

//--------------------------- Chức vụ ---------------------------
Route::group(['prefix' => 'chucvu'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachCV');   

    Route::get('them','ChucVuController@getThemCV');     
    Route::post('them','ChucVuController@postThemCV');  
    
    Route::get('sua/{id_chucvu}','ChucVuController@getSuaCV');
    Route::post('sua/{id_chucvu}','ChucVuController@postSuaCV');

    Route::get('xoa/{id_chucvu}','ChucVuController@getXoaCV');
});

Route::group(['prefix' => 'phucap'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachPC');   

    // Route::get('them','PhucapController@getThemPC');     
    // Route::post('them','PhucapController@postThemPC');  
    
    Route::get('sua/{id}','PhucapController@getSuaPC');
    Route::post('sua/{id}','PhucapController@postSuaPC');

    // Route::get('xoa/{id}','PhucapController@getXoaPC');
});

//--------------------------- Nhân Viên ---------------------------
Route::group(['prefix' => 'nhanvien'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachNV'); 
    //-------------------------- Chi tiết -----------------------------------
    Route::get('chitiet/{id}','DanhmucController@getHoSoFull');
    Route::get('{num}','DanhmucController@getDanhSachNVLoai');

    Route::get('them','DanhmucController@getDanhSachCV');     //chua lam
    Route::post('them','DanhmucController@getDanhSachCV');     //chua lam
    
    Route::get('sua','PhongbanController@getFormPB');   //chua lam
    Route::post('sua','PhongbanController@addPhongBan');    //chua lam


});

//--------------------------- Hợp đồng ---------------------------
Route::group(['prefix' => 'hopdong'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachHD');
    Route::get('nhanvien/{id}','DanhmucController@getDanhSachHDNV');   

    Route::get('them','DanhmucController@getDanhSachCV');     //chua lam
    Route::post('them','DanhmucController@getDanhSachCV');     //chua lam
    
    Route::get('sua','PhongbanController@getFormPB');   //chua lam
    Route::post('sua','PhongbanController@addPhongBan');    //chua lam
});

//--------------------------- Ý kiến ---------------------------
Route::group(['prefix' => 'ykien'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachYK');      //Danh sách toàn bộ
    Route::get('danhsach/loai/{id}','DanhmucController@getDanhSachYKL');    //Danh sách theo loại ý kiến
    Route::get('danhsach/theodoi','YKienController@getDSYKCaNhan');
    Route::get('danhsach/chitiet/{id_luuykien}','YkienController@getChiTietYK');     //Danh sách để người dùng theo dõi
    
    Route::post('danhsach/{id}/{id_luuykien}','YKienController@postDuyetYK');       //Duyệt ý kiến 

    Route::get('them','YKienController@getThemYK');         //thêm
    Route::post('them','YKienController@postThemYK');       //thêm
    
    Route::get('sua/{id_luuykien}','YKienController@getSuaYK');     //sửa
    Route::post('sua/{id_luuykien}','YKienController@postSuaYK');   //sửa

    Route::get('xoa/{id_luuykien}','YKienController@getXoaYK');     //xóa
});

//--------------------------- Loại ý kiến ---------------------------
Route::group(['prefix' => 'loaiykien'], function () {
    Route::get('danhsach','DanhmucController@getDanhSachLoaiYK');

    Route::get('them','LoaiYKienController@getThemLoaiYK');   
    Route::post('them','LoaiYKienController@postThemLoaiYK');
    
    Route::get('sua/{id_ykien}','LoaiYKienController@getSuaLoaiYK');  
    Route::post('sua/{id_ykien}','LoaiYKienController@postSuaLoaiYK');

    Route::get('xoa/{id_ykien}','LoaiYKienController@getXoaLoaiYK');
});

//--------------------------- Chấm Công ---------------------------
Route::group(['prefix' => 'chamcong'], function () {
    Route::get('/','ChamCongController@getChamCong');
    Route::post('checkin','ChamCongController@checkin')->name('checkin');
    Route::post('checkout','ChamCongController@checkout')->name('checkout');

    Route::get('danhsach','DanhMucController@getDanhSachChamCong');

    Route::get('tangca','ChamCongcontroller@getTangCa')->name('tangca');

    Route::post('checkin_tangca','ChamCongController@checkinTangCa')->name('checkin_tangca');
    Route::post('checkout_tangca','ChamCongController@checkoutTangCa')->name('checkout_tangca');
});
//--------------------------------17.7--------------------------------
Route::group(['prefix' => 'luong'], function () {
    // Route::get('/','LuongController@getLuong');
    Route::get('danhsach','DanhmucController@getDanhSachLuong');
    Route::get('chitiet/{id_bangluong}','LuongController@chiTietLuong');
    Route::post('update','LuongController@updateLuong')->name('update');
});


Route::get('checkkk/{id}','DanhmucController@getHopDongNhanVien');
//-------------------------- Chi tiết -----------------------------------
// Route::get('nhanvien/{num}','DanhmucController@getDanhSachNVLoai');
// Route::get('hoso/{id}','DanhmucController@getHoSoFull');
// Route::get('checkkk/{id}','DanhmucController@getHopDongNhanVien');

//------------------------- Nhân Viên -----------------------------
Route::get('thongtin/{id}','NhanVienController@getHoSoNhanVien'); //Lấy thông tin hồ sơ sử dụng cho xem thông tin cá nhân


Route::get('suathongtin/{id}','NhanVienController@getSuaHoSoNhanVien');
Route::post('suathongtin/{id}','NhanVienController@postSuaHoSoNhanVien');


Route::get('{id}/hopdong','NhanVienController@getHopDongNhanVien');
Route::get('{id}/giadinh','NhanvienController@getGiaDinh');
Route::get('{id}/baohiem','NhanvienController@getBaoHiem');
/*Route::get('{id}/luong-thue','');
Route::get('{id}/chamcong','');
Route::get('{id}/congviec','');
Route::get('{id}/ykien','');*/


//-------------------------- Quản lý nhân sự ----------------------------------
Route::get('laphoso','QLNhansuController@getThemnhanvien');
Route::post('laphoso','QLNhansuController@postThemnhanvien');
Route::get('laphoso','QLNhansuController@getThemnhanvien');
Route::post('laphoso','QLNhansuController@postThemnhanvien');
Route::get('laphopdong/{id}','QLNhansuController@getLaphopdong');
Route::post('laphopdong/{id}','QLNhansuController@postLaphopdong');
Route::get('laphopdong/pdf/{id}','QLNhansuController@getPDFhopdong');
Route::get('chitiethopdong/{id}','QLNhansuController@getChitiethopdong');


Route::get('phuluc/{id}','QLNhansuController@getPhulucNV');
Route::get('chitietphuluc/{idhopdong}/{idphuluc}','QLNhansuController@getchitietPhulucNV');
Route::get('lapphuluc/{id}','QLNhansuController@getlapPhulucNV');
Route::post('lapphuluc/{id}','QLNhansuController@postlapPhulucNV');
Route::get('lapphuluc/pdf/{id}','QLNhansuController@getPDFphuluc');




Route::get('quyetdinhthoiviec','QLNhansuController@getThoiviec');
Route::get('quyetdinhthoiviecNV/{id}','QLNhansuController@getThoiviecNv');
Route::post('quyetdinhthoiviecNV/{id}','QLNhansuController@postThoiviecNv');

//----------------------Form thêm nhân viên -------------------------
Route::group(['prefix'=>'ajax'],function(){
    Route::get('chucvu/{id_phongban}','AjaxController@getChucvu');



    Route::get('chucvu_moi/{id_phongban_moi}','AjaxController@getChucvumoi');

    Route::get('phucap_moi/{id_chucvu_moi}','AjaxController@getPhucapmoi');
});
});

//Route::get('test','YKienController@testtime');
Route::get('testt','ChamCongController@checkout');
Route::get('test','YKienController@testtime');





Route::get('/','PageController@trangchu');
Route::get('trangchu','PageController@trangchu');
Route::get('tintucsukienall','PageController@tintucsukienall');
Route::get('tintucsukien/{id}','PageController@tintucsukien');
Route::get('tintuc/{id}','PageController@tintuc');

Route::get('dangnhap','PageController@getDangnhap');
Route::post('dangnhap','PageController@postDangnhap');
Route::get('dangxuat','PageController@getDangXuat');
Route::post('comment/{id}','CommentController@postComment');
Route::get('nguoidung','PageController@getNguoiDung');
Route::post('nguoidung','PageController@postNguoiDung');
Route::get('dangky','PageController@getDangky');
Route::post('dangky','PageController@postDangky');
Route::get('lienhe','PageController@getLienhe');
Route::get('gioithieuchung','PageController@getGioithieuchung');
