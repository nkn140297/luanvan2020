<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\tbl_dantoc;
use App\tbl_tinh;
use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_hosonhanvien;
use App\tbl_vitri;
use App\tbl_lienhe;
use App\tbl_trinhdo;
use App\User;
use App\tbl_hopdong;
use App\tbl_loaihopdong;
use App\tbl_luuykien;
use App\tbl_hoso;
use App\tbl_phucap;
use App\tbl_phuluc;
use App\tbl_loaiphuluc;
use App\tbl_chitietphuluc;
use PDF;

class QLNhansuController extends Controller
{


     public function getThemnhanvien(){
        $dantoc=tbl_dantoc::all();
        $tinh=tbl_tinh::all();
        $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::all();
        $ds_ho_so = tbl_hoso::all();
        // foreach($ds_ho_so as $k => $v){
        //     var_dump($k."-".$v);
        // }
        
        
        // exit;
        return view('quanlynhansu.laphosoNV',['dantoc'=>$dantoc,'tinh'=>$tinh,'phongban'=>$phongban,'chucvu'=>$chucvu,'ds_ho_so'=>$ds_ho_so]);
        
    }
    public function postThemnhanvien(Request $request){
        $demhoso=tbl_hosonhanvien::latest()->first();
        $arrName = explode(".", $demhoso->id_nhanvien);      
        $so = array_pop($arrName)+1;

        $hosonhanvien= new tbl_hosonhanvien;
        
        $hosonhanvien->ho_ten=$request->ho_ten;
        $hosonhanvien->ngay_sinh=$request->ngay_sinh;
        $hosonhanvien->gioi_tinh=$request->gioi_tinh;
        
        $hosonhanvien->id_dantoc=$request->dan_toc;
        $hosonhanvien->ton_giao=$request->ton_giao;
        $hosonhanvien->so_cmnd=$request->so_cmnd;
        $hosonhanvien->ngay_cap_cmnd=$request->ngay_cap_cmnd;
        $hosonhanvien->noi_cap_cmnd=$request->noi_cap_cmnd;
        if( $hosonhanvien->gioi_tinh==1){
        $hosonhanvien->anh_dai_dien="usermen.jpg";
        }
        if( $hosonhanvien->gioi_tinh==0){
            $hosonhanvien->anh_dai_dien="usergirl.jpg";
            }
        
        $hosonhanvien->id_hoso=implode(",",$request->hoso);
        $hosonhanvien->tinh_trang=1;
        $hosonhanvien->id_chucvu=$request->chuc_vu;


        $hoten=changeTitle($request->ho_ten);
        
        $arrName = explode("-", $hoten);
        $ten = array_pop($arrName);
        $tenhoa=ucfirst(strtolower($ten));
        $hosonhanvien->id_nhanvien=$hosonhanvien->id_chucvu.'.'.$tenhoa.'.'.$so;
        $hosonhanvien->save();  
        
        
        $lienhe= new tbl_lienhe;
        $lienhe->sdt_ca_nhan=$request->sdt_ca_nhan;
        $lienhe->sdt_nha=$request->sdt_nha;
        $lienhe->email=$request->email;
        $lienhe->dia_chi_thuong_tru=$request->dia_chi_thuong_tru;
        $lienhe->id_tinh_thuong_tru=$request->tinh_thuong_tru;
        $lienhe->dia_chi_tam_tru=$request->dia_chi_tam_tru;
        $lienhe->id_tinh_tam_tru=$request->tinh_tam_tru;
        $lienhe->id_nhanvien=$hosonhanvien->id_nhanvien;

        $trinhdo=new tbl_trinhdo;
        $trinhdo->muc_trinh_do=$request->muc_trinh_do;
        $trinhdo->noi_dao_tao=$request->noi_dao_tao;
        $trinhdo->nganh_dao_tao=$request->nganh_dao_tao;
        $trinhdo->chuyen_nganh=$request->chuyen_nganh;
        $trinhdo->nam_tot_nghiep=$request->nam_tot_nghiep;
        $trinhdo->xep_loai=$request->xep_loai;
        $trinhdo->chung_chi_khac=$request->chung_chi_khac;
        $trinhdo->id_nhanvien=$hosonhanvien->id_nhanvien;


        $user= new User;
        $user->name=$request->name;
        $user->email=$hosonhanvien->id_nhanvien."@cty.com.vn";
        $pass=str_random(6);
        $user->password=bcrypt($pass);
        $user->id_nhanvien=$hosonhanvien->id_nhanvien;
        $user->save();

        $trinhdo->save();

        $lienhe->save();
        $data=array(
            'email' => $user->email,
            'password'=> $pass,
        );
        
        Mail::to($request->email)->send(new SendMail($data));


        
        return redirect('private/hopdong/nhanvien/'.$hosonhanvien->id_nhanvien)->with('thongbao','Bạn lập hố sơ thông tin nhân viên thành công, xin tiếp tục với lập hợp đồng lao động');

    }

    public function getLaphopdong($id_nhanvien){
        
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $loaihd=tbl_loaihopdong::all();
        $hopdong=tbl_hopdong::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        // $demphuluc=tbl_phuluc::count()+1;
        // $price =tbl_hopdong::where('id_loaihopdong',1)->count();
        // var_dump($price);
        // exit;
        $phucap=tbl_phucap::where('id_chucvu',$nhanvien->id_chucvu)->first();
        return view('quanlynhansu.laphopdongNV',['nhanvien'=>$nhanvien,'hopdong'=>$hopdong,'phucap'=>$phucap,'loaihd'=>$loaihd]);
    }
    public function postLaphopdong(Request $request,$id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        $hopdong=tbl_hopdong::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        foreach($hopdong as $hopdong){
            if(isset($hopdong)){
            $hopdong->trang_thai=0;
             $hopdong->save();
        }
        
    }

        $phucap=tbl_phucap::where('id_chucvu',$nhanvien->id_chucvu)->first();
        $demhopdong=tbl_hopdong::count()+1;
        $hopdong=new tbl_hopdong;
        $hopdong->id_hopdong=$demhopdong.'-HDLD-ABC';
        $hopdong->id_loaihopdong=$request->ten_hop_dong;
        $hopdong->ngay_bat_dau_hop_dong=$request->ngay_bat_dau_hop_dong;
        $hopdong->muc_luong_chinh=$request->muc_luong_chinh;
        $hopdong->id_phucap=$phucap->id;
        $hopdong->phu_cap=$phucap->tong_tien_phu_cap;
        $hopdong->ngay_ket_thuc_hop_dong=$request->ngay_ket_thuc_hop_dong;
        $hopdong->trang_thai=1;
        $hopdong->id_nhanvien=$nhanvien->id_nhanvien;
        $hopdong->nguoi_laphd=Auth::user()->tbl_hosonhanvien->ho_ten;
        $hopdong->save();
        return redirect('private/hopdong/nhanvien/'.$id_nhanvien);

    }



    public function getPDFhopdong($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $lienhequanly=Auth::user()->tbl_hosonhanvien->id_nhanvien;
        $lienheql=tbl_lienhe::where('id_nhanvien',$lienhequanly)->first();
        $lienheql->id_tinh_thuong_tru;
        $lienhenv=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        $lienhenv->id_tinh_thuong_tru;

        
        
        $data['nhanvien']=$nhanvien;
        $data['hopdong']=$hopdong;
        $data['lienheql']=$lienheql;
        $data['lienhenv']=$lienhenv;
        
        
        $pdf = PDF::loadView('quanlynhansu.pdfhopdong', $data);
        return $pdf->stream('hopdongNV.pdf');
        
    }

    public function getChitiethopdong($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $phuluc1=tbl_phuluc::where('id_hopdong',$id_hopdong)->first();
        if(isset($phuluc1)){
        $phuluc=tbl_phuluc::where('id_loaiphuluc',$phuluc1->id_loaiphuluc)->first();
        
        // dd($phuluc);
        return view('quanlynhansu.chitiethopdongNV',['hopdong'=>$hopdong,'phuluc'=>$phuluc]);
        }
        else
        return view('quanlynhansu.chitiethopdongNV',['hopdong'=>$hopdong]);

    }

    public function getPhulucNV($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();

        
        $phuluc=tbl_phuluc::where('id_hopdong',$id_hopdong)->get();   
        return view('quanlynhansu.phulucNV',['hopdong'=>$hopdong,'phuluc'=>$phuluc]);
    }
    public function getchitietPhulucNV($id_hopdong,$id_phuluc){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $phuluc=tbl_phuluc::where('id_phuluc',$id_phuluc)->first();
        $chitiet=tbl_chitietphuluc::where('id',$phuluc->id_chitiet)->first();
        
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        return view('quanlynhansu.chitietphulucNV',['hopdong'=>$hopdong,'phuluc'=>$phuluc,'chitiet'=>$chitiet,'nhanvien'=>$nhanvien]);
    }
    public function getlapPhulucNV($id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $phuluc=tbl_phuluc::where('id_hopdong',$id_hopdong)->get();
        $loaipl=tbl_loaiphuluc::all();
        $loaihd=tbl_loaihopdong::all();
        $phongban=tbl_phongban::all();
        $chucvu=tbl_chucvu::all();
        $phucap=tbl_phucap::all();
        return view('quanlynhansu.lapphulucNV',['hopdong'=>$hopdong,'loaipl'=>$loaipl,'nhanvien'=>$nhanvien,'phongban'=>$phongban,'chucvu'=>$chucvu,'phucap'=>$phucap,'loaihd'=>$loaihd]);
        
    }
    public function postlapPhulucNV(Request $request, $id_hopdong){
        $hopdong=tbl_hopdong::where('id_hopdong',$id_hopdong)->first();
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $demphuluc=tbl_phuluc::count()+1;
        $phuluc=new tbl_phuluc;
        $phuluc->id_phuluc=$demphuluc.'_HĐLĐ-ABC';
        $phuluc->id_hopdong=$id_hopdong;
        $phuluc->nguoi_lap_phu_luc=Auth::user()->tbl_hosonhanvien->ho_ten;
        $phuluc->id_loaiphuluc=$request->ten_hop_dong;
        
        $chitiet=new tbl_chitietphuluc;
        $chitiet->noi_dung_khac=$request->noi_dung_khac;
        $chitiet->thay_doi_luong=$request->thay_doi_luong;
        $chitiet->id_chucvu_moi=$request->chuc_vu_moi;
        
        $phucap=tbl_phucap::where('id_chucvu',$chitiet->id_chucvu_moi)->first();
        if(isset($phucap)){
        $chitiet->id_phucap_moi=$phucap->id;
        }
        else
        $chitiet->id_phucap_moi=null;
        $chitiet->id_loaihopdong_moi=$request->hop_dong_moi;
        $chitiet->ngay_bat_dau=$request->ngay_bat_dau;
        if(isset($request->ngay_ket_thuc)){
        $chitiet->ngay_ket_thuc=$request->ngay_ket_thuc;
        }
        else{
        $chitiet->ngay_ket_thuc=$hopdong->ngay_ket_thuc_hop_dong;
        }
        $chitiet->id_hopdong=$id_hopdong;
        $chitiet->save();
        $phuluc->id_chitiet=$chitiet->id;
        $phuluc->save();
        return redirect('private/chitietphuluc/'.$id_hopdong.'/'.$phuluc->id_phuluc)->with('thongbao','Thêm Thành Công');
        
    }
    public function getPDFphuluc($id_phuluc){
        $phuluc=tbl_phuluc::where('id_phuluc',$id_phuluc)->first();
        $chitiet=tbl_chitietphuluc::where('id_phuluc',$phuluc->id_phuluc)->first();
        $hopdong=tbl_hopdong::where('id_hopdong',$phuluc->id_hopdong)->first();


        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $lienhequanly=Auth::user()->tbl_hosonhanvien->id_nhanvien;
        $lienheql=tbl_lienhe::where('id_nhanvien',$lienhequanly)->first();
        $lienheql->id_tinh_thuong_tru;
        $lienhenv=tbl_lienhe::where('id_nhanvien',$hopdong->id_nhanvien)->first();
        $lienhenv->id_tinh_thuong_tru;

        
        
        
        
        
        
        $data['lienheql']=$lienheql;
        $data['lienhenv']=$lienhenv;
        $data['nhanvien']=$nhanvien;
        $data['hopdong']=$hopdong;
        $data['phuluc']=$phuluc;
        $data['chitiet']=$chitiet;
        $pdf = PDF::loadView('quanlynhansu.pdfphuluc', $data);
        return $pdf->stream('phulucNV.pdf');
    }
    
    public function  getThoiviec(){
        $nhanvien=tbl_hosonhanvien::where('tinh_trang',1)->get();
        return view('quanlynhansu.quyetdinhthoiviec',['nhanvien'=>$nhanvien]);
    }
    public function  getThoiviecNV($id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();
        return view('quanlynhansu.quyetdinhthoiviecNV',['nhanvien'=>$nhanvien]);
    }
    public function  postThoiviecNV(Request $request,$id_nhanvien){
        $nhanvien=tbl_hosonhanvien::where('tinh_trang',1)->get();
         $user = Auth::user();
        $ykien = new tbl_luuykien;
        $ykien->id_ykien = 6;
        $ykien->trang_thai=1;
        $ykien->nguoi_duyet= $user->tbl_hosonhanvien->ho_ten; 
        $ykien->ly_do = $request->ly_do;
        $ykien->id_nhanvien = $id_nhanvien;
        $ykien->nguoi_dua_y_kien = $user->tbl_hosonhanvien->ho_ten;
        $ykien->save();

        $nv_tinhtrang=tbl_hosonhanvien::where('id_nhanvien',$id_nhanvien)->first();;
        $nv_tinhtrang->tinh_trang=2;
        $nv_tinhtrang->save();
        return redirect('private/quyetdinhthoiviec');
    }
}
