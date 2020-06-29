<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_ykien extends Model
{
    protected $table= "tbl_ykien";
    public function tbl_luuykien(){
        return $this->hasMany('App\tbl_luuykien','id_ykien','id_luuykien');
    }
}
