<?php

namespace App\Http\Controllers\backend;

use App\backend\sliderModels;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class sliderController extends Controller
{
    public function show(){
        $slidertüm = sliderModels::all();
        return view('backend.slider.index',compact('slidertüm'));
    }

    public function showformadd(){
        return view('backend.slider.slidereklemeform');
    }

    public function sliderinsertdata(Request $request){

        $request->validate([
            "slider_baslik" => "required"
        ]);

        $resim = Storage::disk('uploads')->putFile("/slider",$request->file("slider_resim"));
        $sliderekle = new sliderModels();
        $sliderekle->slider_baslik = $request->slider_baslik;
        $sliderekle->slider_resim = $resim;
        $s = $sliderekle->save();




        if($s){
            return redirect(route('.admin.slider.anasayfa'))->with('message','başarıyla eklendiniz');
        }

    }

    public function slidersil($id){
        $sil = sliderModels::where('id',$id)->delete();
        if($sil){
            echo "Sildi";
        }else{
            echo "Sorun var";
        }
    }

    public function updateshowform($id){
        $update = sliderModels::where('id',$id)->first();
        return view('backend.slider.sliderupdateform',compact('update'));
    }

    public function updateformdata(Request $request,$id){

        $lastdata = DB::table('sliders')->where('id',$id)->first();


        $request->validate([
            "slider_baslik" => "required"
        ]);

        $resim = $lastdata->slider_resim;

        if($request->file('slider_resim')!=null){
            Storage::disk('uploads')->delete($lastdata->slider_resim);
            $resim = Storage::disk('uploads')->putFile("/slider",$request->file("slider_resim"));
        }

        $gnc = DB::table('sliders')->where('id',$id)->update([
            "slider_baslik"=>$request->slider_baslik,
            "slider_resim"=> $resim
        ]);





        if($gnc){
            return redirect(route('.admin.slider.anasayfa'));
        }else{
            echo "Sorun var";
        }


    }

}
