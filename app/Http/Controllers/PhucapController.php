<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_phucap;


class PhucapController extends Controller
{
    // public function getThemPC(){
    //     $chucvu = tbl_chucvu::all();
    //     $phongban = tbl_phongban::all();
    //     return view('layout.phucap.themPC',compact('chucvu','phongban'));
    // }

    // public function postThemPC(Request $request){
    //     $phucap = new tbl_phucap;
    //     $phucap->an_trua = $request->an_trua;
    //     $phucap->xang_xe = $request->xang_xe;
    //     $phucap->trach_nhiem = $request->trach_nhiem;
    //     $phucap->khac=$request->khac;
    //     $phucap->id_chucvu = $request->id_chucvu;
    //     $phucap->save();
    //     return redirect('private/phucap/them')->with('thongbao','Thêm Thành Công');
    // }

    public function getSuaPC($id){
        $phucap =tbl_phucap::find($id);
        return view('layout.phucap.suaPC',compact('phucap'));
    }

    public function postSuaPC(Request $request, $id){
        $phucap=tbl_phucap::find($id);
        $phucap->an_trua = $request->an_trua;
        $phucap->xang_xe = $request->xang_xe;
        // $phucap->trach_nhiem = $request->trach_nhiem;
        $phucap->khac=$request->khac;
        $phucap->tong_tien_phu_cap=$request->khac+$request->an_trua+$request->xang_xe+$request->trach_nhiem;
        $phucap->save();
        return redirect('private/phucap/sua/'.$phucap->id)->with('thongbao','Sửa Thành Công');
    }

    // public function getXoaPC($id){
    //     $phucap=tbl_phucap::find($id);
    //     //thêm điều kiện nếu trong phòng ban có chức vụ thì không được xóa
    //     $phucap->delete();
    //     return redirect('private/phucap/danhsach')->with('thongbao','Xóa Thành Công');
    // }
}
