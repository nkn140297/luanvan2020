<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_chamcong extends Model
{
    protected $table= "tbl_chamcong";
    public function tbl_hosonhanvien(){
    	return $this->belongsTo('App\tbl_hosonhanvien','id_nhanvien','id_chamcong');
    }
    public function tbl_tangca(){
    	return $this->belongsTo('App\tbl_tangca','id_tangca','id_chamcong');
    }
}
