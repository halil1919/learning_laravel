<?php

namespace App\Http\Controllers\backend;

use App\backend\kurumsalModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class kurumsalController extends Controller
{
    public function show(){
        $kurumsal = kurumsalModel::all();
        return view('backend.kurumsal.index',compact('kurumsal'));
    }
    public function ekleformshow(){
        return view('backend.kurumsal.ekleform');
    }

    public function insertdata(Request $request){
        $request->validate([
            "baslik"=>"required",
            "icerik"=>"required"
        ]);

        if($request->file("cover_img")!=""){
            $resim = Storage::disk('uploads')->putFile("/kurumsal",$request->file("cover_img"));
        }else{
            $resim = "";
        }

        $kurumsalekle = new kurumsalModel();
        $kurumsalekle->baslik = $request->baslik;
        $kurumsalekle->icerik = $request->icerik;
        $kurumsalekle->cover_img = $resim;
        $kurumsalekle->self_link = Str::slug($request->baslik);
        $ekle =  $kurumsalekle->save();
        if($ekle){
            return redirect(route('.admin.kurumsal'));
        }

    }
}
