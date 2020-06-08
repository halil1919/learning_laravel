<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class projeKategoriModels extends Model
{
    protected $table = "projekategoris";
    protected $fillable = ["pkategori_ad","pkategori_self"];
    public $timestamps = false;

}
