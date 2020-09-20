<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\tbl_hosonhanvien;
use App\tbl_hopdong;
use App\tbl_giadinh;
use App\tbl_baohiem;
use App\tbl_lienhe;
use App\tbl_tinh;
use App\tbl_trinhdo;
use App\user;
use App\tbl_dantoc;
use App\tbl_phongban;
use App\tbl_chucvu;
use App\tbl_vitri;
use App\tbl_hoso;
use App\tbl_phuluc;
use App\tbl_chitietphuluc;

class NhanVienController extends Controller
{
    public function getview(){ 
        
        $tongnhanvien=tbl_hosonhanvien::count();
        $nhanviennam =tbl_hosonhanvien::where('gioi_tinh',1)->count();
        $nhanviennu =tbl_hosonhanvien::where('gioi_tinh',0)->count();
        return view('layout.content',['tongnhanvien'=>$tongnhanvien,'nhanviennam'=>$nhanviennam,'nhanviennu'=>$nhanviennu]);
        
    }
    
    

    public function getDangnhap(){
    	return view('login');
    }
    public function postDangnhap(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('private');
        }
        else{
            return redirect('login')->with('thongbao','Tài khoảng hoặc mật khẩu không đúng, vui lòng đăng nhập lại');
        }
    }
    public function getHoSoNhanVien(){
        $ds_ho_so = tbl_hoso::all();
        // $user = User::find($id);
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',Auth::user()->id_nhanvien)->first();
        
        $lienhe=tbl_lienhe::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        
        $trinhdo=tbl_trinhdo::where('id_nhanvien',$nhanvien->id_nhanvien)->get();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
        
        $hopdong=tbl_hopdong::where([['id_nhanvien',Auth::user()->id_nhanvien],['trang_thai','1']])->first();
        $phuluc=tbl_phuluc::where([['id_hopdong',$hopdong->id_hopdong],['id_loaiphuluc','2']])->first();
        if(isset($phuluc)){
            return view('pages.hosonhanvien',['nhanvien'=>$nhanvien,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'ds_ho_so'=>$ds_ho_so,'user'=>$user,'phuluc'=>$phuluc]);
        
        }
        return view('pages.hosonhanvien',['nhanvien'=>$nhanvien,'lienhe'=>$lienhe,'trinhdo'=>$trinhdo,'ds_ho_so'=>$ds_ho_so,'user'=>$user]);
    }

    public function postThongtinTaikhoan(Request $request){
        $nhanvien=tbl_hosonhanvien::where('id_nhanvien',Auth::user()->id_nhanvien)->first();
        $user=User::where('id_nhanvien',$nhanvien->id_nhanvien)->first();
         
        if($request->hasFile('Hinh')){

            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/arvarta/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/arvarta",$Hinh);
            $nhanvien->anh_dai_dien=$Hinh;
        }
        $user->name=$request->name;
        $user->password=bcrypt($request->password);


        $user->save();
        $nhanvien->save();
        return redirect('private/thongtincanhan')->with('thongbao','Sửa đổi thông tin tài khoản thành công');
    }
    
    public function getDangXuatAdmin(){
        Auth::logout();
         return redirect('login');
    }

    public function getHopDongNhanVien($id){
        $hopdong=tbl_hopdong::where('id_nhanvien','=',$id)->get();
            return view('pages.hopdong',['hopdong'=>$hopdong]);
    }

    // public function getGiaDinh($id){
    //     $giadinh=tbl_giadinh::where('id_nhanvien','=',$id)->get();
    //     return view('pages.giadinh',['giadinh'=>$giadinh]);
    // }

    // public function getBaoHiem($id){
    //     $baohiem=tbl_baohiem::where('id_nhanvien','=',$id)->get();
    //     return view('pages.baohiem',['baohiem'=>$baohiem]);
    // }
}
