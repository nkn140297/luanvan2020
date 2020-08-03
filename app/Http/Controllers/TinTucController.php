<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;

class TinTucController extends Controller
{
    public function getDanhSach(){
    	$tintuc=TinTuc::all();
    	return view('quanlytintuc.danhsachtintuc',['tintuc'=>$tintuc]);
    }
    public function getThem(){
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
    	return view('quanlytintuc.themtintuc',['theloai'=>$theloai,'loaitin'=>$loaitin]);

    }
    public function postThem(Request $request){
    	// $this->validate($request,
        //     ['LoaiTin'=>'required','TieuDe'=>'required|min:3|unique:TinTuc,TieuDe','NoiDung'=>'required'
        //     ],
        //     ['LoaiTin.required'=>'Bạn chưa chọn loại tin!!',
        //         'TieuDe.required'=>'Bạn chưa nhập tiêu đề!!',
        //         'TieuDe.min'=>'Tiêu đề tin quá ngắn',
        //         'TieuDe.unique'=>'Tên loại tin đã tồn tại.',
        //         'NoiDung.unique'=>'Bạn chưa nhập nội dung'
        //     ]);
        $tintuc= new TinTuc;
        
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->NoiBat=$request->NoiBat;
        if($request->hasFile('Hinh')){
        
            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }
        else{
            $tintuc->Hinh="";
        }
        
        $tintuc->save();
        return redirect('private/tintuc/danhsach')->with('thongbao','Thêm thành công');
    }


    public function getSua($id){
        
        $tintuc=TinTuc::find($id);
    	$theloai=TheLoai::all();
        $loaitin=LoaiTin::all();
        return view('quanlytintuc.suatintuc',['theloai'=>$theloai,'loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function postSua(Request $request,$id){
    	$tintuc=TinTuc::find($id);
     $this->validate($request,
            ['LoaiTin'=>'required','NoiDung'=>'required'
            ],
            ['LoaiTin.required'=>'Bạn chưa chọn loại tin!!',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề!!',
                'TieuDe.min'=>'Tiêu đề tin quá ngắn',
                'NoiDung.unique'=>'Bạn chưa nhập nội dung'
            ]);
        
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->NoiDung=$request->NoiDung;
        if($request->hasFile('Hinh')){

            $file=$request->file('Hinh');

            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            while (file_exists("upload/tintuc/".$Hinh)) {
               $Hinh=str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh=$Hinh;
        }
        $tintuc->save();
        return redirect('private/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
    	$tintuc=TinTuc::find($id);
        $tintuc->delete();
        return redirect('private/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }
}
