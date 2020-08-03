<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_hosonhanvien;
use App\tbl_vitri;
use App\tbl_ykien;
use App\tbl_luuykien;
use App\tbl_hopdong;
use App\tbl_phucap;
use App\tbl_loaihopdong;
use App\tbl_chamcong;
use App\tbl_phuluc;

class DanhmucController extends Controller
{
/*    protected $ykien;

    public function __construct(){
        $this->$ykien=tbl_ykien::all();
        View::share(['ykien'=> $this->ykien])
    }  
    public function getYKien(){
        $ykien=tbl_ykien::all();
        return $ykien;
    } */

     public function getDanhSachPB(){
    	$phongban=tbl_phongban::all();
    	return view('danhmuc.dspb',['phongban'=>$phongban]);
    }


    public function getDanhSachPC(){
        $phucap=tbl_phucap::all();
        $chucvu=tbl_chucvu::all();
    	return view('danhmuc.dspc',['phucap'=>$phucap,'chucvu'=>$chucvu]);
    }
    

    public function getDanhSachCV(){
    	$chucvu=tbl_chucvu::all();
    	return view('danhmuc.dscv',['chucvu'=>$chucvu]);
    }

    public function getDanhSachNV(){
        $nhanvien=tbl_hosonhanvien::all(); 
        return view('danhmuc.dsnv',['nhanvien'=>$nhanvien]);
    }

    public function getDanhSachHD(){
        $hopdong=tbl_hopdong::all();
        
        return view('danhmuc.dshd',['hopdong'=>$hopdong]);
    }

    public function getDanhSachHDNV($id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $hopdong=tbl_hopdong::where('id_nhanvien',$id_nhanvien)->get();
        foreach($hopdong as $hd){
        
        $phuluc=tbl_phuluc::where('id_hopdong',$hd->id_hopdong)->first();
        if(isset($phuluc))
        return view('danhmuc.dshdnv',['hopdong'=>$hopdong,'nhanvien'=>$nhanvien,'phuluc'=>$phuluc]);
    }
        
       
       
        
        
        
        return view('danhmuc.dshdnv',['hopdong'=>$hopdong,'nhanvien'=>$nhanvien]);
    }
    
    public function getDanhSachNVLoai($num){
        $nhanvien=tbl_hosonhanvien::where('tinh_trang','=',$num)->get();
        return view('danhmuc.dsnvl',compact('nhanvien','num'));
    }

    public function getHoSoFull($id){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien','=',$id)->get();
        $hopdong=tbl_hopdong::where('id_nhanvien','=',$id)->get();
        //$chamcong=tbl_chamcong::where('id_nhanvien','=',$id)->get();
        return view('pages.chitiethoso',compact('nhanvien','hopdong'));
    }

    public function getDanhSachYK(){
        $ykien = tbl_luuykien::all();
        return view('danhmuc.dsyk',['ykien'=>$ykien]);
    }
    
    public function getDanhSachYKL($id){
        $ykien = tbl_luuykien::where('id_ykien',$id)->get();
        $loai = tbl_ykien::find($id);
        return view('danhmuc.dsykl',compact('ykien','loai'));
    }

    public function getDanhSachLoaiYK(){
        $loaiykien = tbl_ykien::all();
        return view('danhmuc.dsloaiyk',compact('loaiykien'));
    }

    public function getDanhSachChamCong(){
        $chamcong = tbl_chamcong::where('check_in','like', date('Y-m-d').'%')->get(); 
        //var_dump($chamcong);exit;
        return view('danhmuc.dschamcong',compact('chamcong'));
    }
}
