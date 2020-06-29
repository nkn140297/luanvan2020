<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_hosonhanvien;
use App\tbl_vitri;

class DanhmucController extends Controller
{
     public function getDanhSachPB(){
    	$phongban=tbl_phongban::all();
    	return view('admin.danhmuc.dspb',['phongban'=>$phongban]);
    }

    public function getDanhSachCV(){
    	$chucvu=tbl_chucvu::all();
    	return view('admin.danhmuc.dscv',['chucvu'=>$chucvu]);
    }

    public function getDanhSachNV(){
        $nhanvien=tbl_hosonhanvien::all(); 
        return view('admin.danhmuc.dsnv',['nhanvien'=>$nhanvien]);
    }

    public function getDanhSachNVLoai($num){
        $nhanvien=tbl_hosonhanvien::where('id_vitri','=',$num)->get();
        if($num == 1)
            return view('admin.danhmuc.dsnvtv',['nhanvien'=>$nhanvien]);
        else if ($num == 2)
            return view('admin.danhmuc.dsnvct',['nhanvien'=>$nhanvien]);
        else
            return view('admin.danhmuc.dsnvnv',['nhanvien'=>$nhanvien]);
    }

    public function getHoSoNhanVien($id){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien','=',$id)->get();
             return view('admin.danhmuc.hosonhanvien',['nhanvien'=>$nhanvien]);
    }
}
