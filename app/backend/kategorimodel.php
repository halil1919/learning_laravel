<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class kategorimodel extends Model
{
    protected $table = "kategoriler";

    public function child(){
        return $this->hasMany(self::class,'parent_id',"kategori_id");
    }
}
