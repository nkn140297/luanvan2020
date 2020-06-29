<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_phuluc extends Model
{
    protected $table= "tbl_phuluc";
    public function tbl_hopdong(){
        return $this->belongsTo('App\tbl_hopdong','id_hopdong','id_phucluc');
    }
}
