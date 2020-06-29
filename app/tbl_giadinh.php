<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_giadinh extends Model
{
    protected $table= "tbl_giadinh";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_hosonhanvien','id_giadinh');
    }
}
