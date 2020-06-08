<?php

namespace App\backend;

use Illuminate\Database\Eloquent\Model;

class sliderModels extends Model
{
    protected $table = "sliders";
    protected $fillable = ['slider_baslik','slider_resim'];
    public $timestamps = false;
}
