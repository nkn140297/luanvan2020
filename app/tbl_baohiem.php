<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_baohiem extends Model
{
    protected $table= "tbl_baohiem";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_baohiem');
    }
}
