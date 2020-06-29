<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_trinhdo extends Model
{
    protected $table= "tbl_trinhdo";
    public function tbl_hosonhanvien(){
        return $this->belongsTo('App\tbl_hosonhanvien','id_hosonhanvien','id_trinhdo');
    }
}
