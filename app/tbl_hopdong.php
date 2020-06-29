<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_hopdong extends Model
{
    protected $table= "tbl_hopdong";
    public function tbl_thuecanhan(){
        return $this->belongsTo('App\tbl_thuecanhan','id_thuecanhan','id_hopdong');
    }   
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_hopdong');
    }

}
