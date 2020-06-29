<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_hosonhanvien;
class DanhmucController extends Controller
{
     public function getDanhSachPB(){
    	$phongban=tbl_phongban::all();
    	return view('admin.danhmuc.danhsachpb',['phongban'=>$phongban]);
    }

    public function getDanhSachCV(){
    	$chucvu=tbl_chucvu::all();
    	return view('admin.danhmuc.danhsachcv',['chucvu'=>$chucvu]);
    }

    public function getDanhSachNV(){
        $nhanvien=tbl_hosonhanvien::all();
        return view('admin.danhmuc.danhsachnv',['nhanvien'=>$nhanvien]);
    }
}
