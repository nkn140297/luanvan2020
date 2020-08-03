<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_chucvu;
use App\tbl_phongban;
use App\tbl_phucap;
class ChucVuController extends Controller
{
    public function getThemCV(){
        $phongban = tbl_phongban::all();
        return view('layout.chucvu.themCV',compact('phongban'));
    }

    public function postThemCV(Request $request){
        $chucvu = new tbl_chucvu;
        $chucvu->id_chucvu = $request->get('id_phongban').$request->get('id_chucvu');
        $chucvu->ten_chuc_vu = $request->get('ten_chuc_vu');
        $chucvu->id_phongban = $request->get('id_phongban');
        //lưu phụ cấp mới dựa vào chức vụ
        $phucap = new tbl_phucap;
        $phucap->id_chucvu = $chucvu->id_chucvu ;
        $chucvu->save();
        $phucap->save();
        return redirect('private/chucvu/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSuaCV($id_chucvu){
        $chucvu=tbl_chucvu::find($id_chucvu);
        return view('layout.chucvu.suaCV',compact('chucvu'));
    }

    public function postSuaCV(Request $request, $id_chucvu){
        $chucvu=tbl_chucvu::find($id_chucvu);
        $chucvu->id_chucvu = $chucvu->id_phongban.$request->get('id_chucvu');
        $chucvu->ten_chuc_vu = $request->get('ten_chuc_vu');
        $chucvu->save();
        return redirect('private/chucvu/sua/'.$chucvu->id_chucvu)->with('thongbao','Sửa Thành Công');
    }

    public function getXoaCV($id_chucvu){
        $chucvu=tbl_chucvu::find($id_chucvu);
        //thêm điều kiện nếu trong phòng ban có chức vụ thì không được xóa----có cả phụ cấp!!
        $chucvu->delete();
        return redirect('private/chucvu/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
