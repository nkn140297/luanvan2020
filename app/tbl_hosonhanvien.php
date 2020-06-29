<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_hosonhanvien extends Model
{
    protected $table= "tbl_hosonhanvien";
    public function tbl_chucvu(){
        return $this->belongsTo('App\tbl_chucvu','id_chucvu','id_chucvu');
    }

    public function tbl_phongban()
        {
            return $this->hasManyThrough('App\tbl_phongban','App\tbl_chucvu','id_nhanvien','id_chucvu','id_phongban');
        }
    
}
