<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class kurumsalModel extends Model
{
    protected $table = "kurumsals";
    protected $fillable = ["baslik","icerik","cover_img","self_link"];
    public $timestamps = false;


}
