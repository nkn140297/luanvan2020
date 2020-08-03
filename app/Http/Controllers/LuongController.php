<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_bangluong;
use App\tbl_hopdong;
use App\tbl_ykien;
use App\tbl_mientrugiacanh;
use App\tbl_tangca;
use App\tbl_luuykien;

use Auth;
class LuongController extends Controller
{
    // public function getLuong(){
    //     $luong = tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)->first()
    //                 ->where('luong_thang', date('Y-m-1'))        
    //                 ->first();
    //     $result = $luong->tong_tien_luong - $luong->thue_thu_nhap;
    //     return view('layout.luong.frmLuong',compact('luong','result'));
    // }
    
    public function updateLuong(){
        $thuecanhan = 11000000; //Thuế của bản thân updated 1.7.2020
        $thuemientru = 4400000; //Thuế miễn trừ gia cảnh 1 người updated 1.7.2020
        $sumtangca = 0; //Tổng giờ làm tăng ca trong tháng
        $sumthuong = 0; //Tổng tiền thưởng
        $sumkyluat = 0; //Tổng tiền kỉ luật
        $luongung = 0;  //Tiền ứng lương
        $thuedong = 0;  //thuế phải đóng
        $luongcoban = tbl_hopdong::where('id_nhanvien',Auth::user()->id_nhanvien)->first();
        $tangca = tbl_tangca::where('id_nhanvien',Auth::user()->id_nhanvien)
                    ->whereMonth('check_in',date('m'))
                    ->where('ghi_nhan',1)
                    ->get();
        foreach($tangca as $tc){
            $sumtangca += $tc->thoi_gian_lam; 
        }
        $luuykien = tbl_luuykien::where('id_nhanvien', Auth::user()->id_nhanvien)
                    ->whereMonth('ngay_bat_dau',date('m'))
                    ->where('trang_thai',1)
                    ->where(function($q){
                        $q->where('id_ykien',9)
                        ->orwhere('id_ykien',10)
                        ->orwhere('id_ykien',5);
                    })        
                    ->get();
        foreach($luuykien as $lyk){
            if($lyk->id_ykien == 9)
                $sumthuong += $lyk->gia_tri;
            else if($lyk->id_ykien == 10)
                $sumkyluat += $lyk->gia_tri;
            else
                $luongung = $lyk->gia_tri;
        }
        $mientrugiacanh = tbl_mientrugiacanh::where('id_nhanvien',Auth::user()->id_nhanvien)->first();
        $luong = tbl_bangluong::where('id_nhanvien',Auth::user()->id_nhanvien)
                    ->where('luong_thang', date('Y-m-1'))        
                    ->first();
        
        $luongtong = ( ($luongcoban->muc_luong_chinh + $luongcoban->phu_cap) / 198 ) * $luong->so_gio_lam_viec;  //1 tháng làm 22 ngày mỗi ngày làm 9 tiếng từ 9h - 18h => 1 tháng làm tổng cộng 198 giờ.
        $thuebh = $luongcoban->muc_luong_chinh * 10.5 / 100;
        
        if($luongcoban->muc_luong_chinh >= (($thuemientru * $mientrugiacanh->so_luong_mien_tru) + $thuecanhan))
        {
            $mientru = $luongcoban->phucap + ($thuemientru * $mientrugiacanh->so_luong_mien_tru) + $thuecanhan + $thuebh; //11tr la thue cua ban than
            $thunhapchiuthue = $luongtong - $mientru;
            if($thunhapchiuthue <= 5000000){
                $bac = 1;
                $thuedong = (5/100) * $thunhapchiuthue;
            }else if($thunhapchiuthue <= 10000000){
                //echo "thuộc bậc 2";
                $thuedong = (10/100) * $thunhapchiuthue - 250000;
            }else if($thunhapchiuthue <= 18000000){
                //echo "thuộc bậc 3";
                $thuedong = (15/100) * $thunhapchiuthue - 750000;
            }else if($thunhapchiuthue <= 32000000){
                //echo "thuộc bậc 4";
                $thuedong = (20/100) * $thunhapchiuthue - 1650000;
            }else if($thunhapchiuthue <= 52000000){
                //echo "thuộc bậc 5";
                $thuedong = (25/100) * $thunhapchiuthue - 3250000;
            }else if($thunhapchiuthue <= 80000000){
                //echo "thuộc bậc 6";
                $thuedong = (30/100) * $thunhapchiuthue - 5850000;
            }else {
                //echo "thuộc bậc 7";
                $thuedong = (35/100) * $thunhapchiuthue - 9850000;
            }
        }
        // echo "Lương Tổng của tháng ".date('m')."là : ".number_format($luongtong);
        // echo "Tiền bảo hiểm phải đóng: ".number_format($thuebh);
        // echo "Thuế phải đóng= ".number_format($thuedong);
        // echo "Tiền nhận được: ".number_format($result);
        $luong->tong_tien_luong = $luongtong;
        $luong->thue_thu_nhap = $thuedong;
        $luong->thue_bao_hiem = $thuebh;
        $luong->save();
        echo "</br>".$luong->tong_tien_luong;
        echo "</br>".$luong->thue_thu_nhap;
        echo "</br>".$luong->thue_bao_hiem;
        echo "</br>".$sumtangca;
        echo "</br>".$sumthuong;
        echo "</br>".$sumkyluat;
        echo "</br>".$luongung;
        exit;
        return redirect('private/luong')->with('thongbao','đã cập nhật lương vào' .date('H:i:s'));
    }

    public function chiTietLuong($id_bangluong){
        $luong = tbl_bangluong::find($id_bangluong);
        $thuong = 0; //Tiền Thưởng
        $kyluat = 0; //tiền kỷ luật
        $tongtangca = 0; //tổng giờ tăng ca
        $khenthuong = tbl_luuykien::whereMonth('updated_at',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where(function($q){
                        $q->where('id_ykien',9)
                        ->orwhere('id_ykien',10);
                    })        
                    ->get();
        foreach($khenthuong as $t){
            if ($t->id_ykien == 9)
                $thuong += $t->gia_tri;
            else
                $kyluat += $t->gia_tri;
        }
        $tangca = tbl_tangca::whereMonth('check_in',date('m',strtotime($luong->luong_thang)))
                    ->where('id_nhanvien',$luong->id_nhanvien)
                    ->where('ghi_nhan',1)
                    ->get(); 
        foreach($tangca as $tc){
            $tongtangca += $tc->thoi_gian_lam;
        }
        return view('layout.luong.chitietLuong',compact('luong','thuong','kyluat','tongtangca'));
    }

}
