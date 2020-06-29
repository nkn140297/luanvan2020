<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_bangluong extends Model
{
    //
    protected $table= "tbl_bangluong";
    public function tbl_thuecanhan(){
        return $this->belongsTo('App\tbl_thuecanhan','id_thuecanhan','id_bangluong');
    }
    public function tbl_chamcong(){
        return $this->belongsTo('App\tbl_chamcong','id_chamcong','id_bangluong');
    }
    public function tbl_khenthuong(){
        return $this->belongsTo('App\tbl_khenthuong','id_khenthuong','id_bangluong');
    }
    public function tbl_kyluat(){
        return $this->belongsTo('App\tbl_kyluat','id_kyluat','id_bangluong');
    }
    public function tbl_congtac(){
        return $this->belongsTo('App\tbl_congtac','id_congtac','id_bangluong');
    }
}
