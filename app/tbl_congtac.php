<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_congtac extends Model
{
    protected $table= "tbl_congtac";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_congtac');
    }
}
