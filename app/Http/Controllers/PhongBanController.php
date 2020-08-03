<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_phongban;

class PhongBanController extends Controller
{
    function getThemPB(){
        return view('layout.phongban.themPB');
    }

    public function postThemPB(Request $request){
        $phongban = new tbl_phongban;
        $phongban->id_phongban= $request->get('id_phongban');
        $phongban->ten_phong_ban= $request->get('ten_phong_ban');
        $phongban->save();
        return redirect('private/phongban/them')->with('thongbao','Thêm Thành Công');
    }

    public function getSuaPB($id_phongban){
        $phongban=tbl_phongban::where('id_phongban',$id_phongban)->first();
        //$phongban=tbl_phongban::find($id_phongban);
        return view('layout.phongban.suaPB',['phongban'=>$phongban]);
    }

    public function postSuaPB(Request $request, $id_phongban){
        $phongban=tbl_phongban::find($id_phongban);
        $phongban->id_phongban = $request->get('id_phongban');
        $phongban->ten_phong_ban = $request->get('ten_phong_ban');
        $phongban->save();
        return redirect('private/phongban/sua/'.$phongban->id_phongban)->with('thongbao','Sửa Thành Công');
    }

    public function getXoaPB($id_phongban){
        $phongban=tbl_phongban::find($id_phongban);
        //thêm điều kiện nếu trong phòng ban có chức vụ thì không được xóa
        $phongban->delete();
        return redirect('private/phongban/danhsach')->with('thongbao','Xóa Thành Công');
    }
    public function tesT(){
        // $phongban ="DVC99";
        // if($phongban[strlen($phongban)-1]<9)
        //     $phongban[strlen($phongban)-1] = $phongban[strlen($phongban)-1]+1;
        // else {
        //     if($phongban[strlen($phongban)-2]<9){
        //         $phongban[strlen($phongban)-2] = $phongban[strlen($phongban)-2]+1;
        //         $phongban[strlen($phongban)-1]=0; 
        //     }
        //     else{
        //         $phongban[strlen($phongban)-3] = $phongban[strlen($phongban)-3] + 1;
        //         $phongban[strlen($phongban)-2]=0;
        //         $phongban[strlen($phongban)-1]=0; 
        //     }
        // }
        //  echo $phongban;
        $phongban ="DVC009999";
        var_dump(($phongban[strlen($phongban)-1]));
        if($phongban[strlen($phongban)-1]<9)
            $phongban[strlen($phongban)-1]= $phongban[strlen($phongban)-1]+1;
        else {
            // $phongban[strlen($phongban)-2]= $phongban[strlen($phongban)-2]+1;
            // $phongban[strlen($phongban)-1]=0;
            if($phongban[strlen($phongban)-2]<9){
                        $phongban[strlen($phongban)-2] = $phongban[strlen($phongban)-2]+1;
                        $phongban[strlen($phongban)-1]=0; 
                    }
                    else{
                        $phongban[strlen($phongban)-3] = $phongban[strlen($phongban)-3] + 1;
                        $phongban[strlen($phongban)-2]=0;
                        $phongban[strlen($phongban)-1]=0; 
                    }
        }
         echo $phongban;
    }
}
