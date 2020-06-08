<?php

namespace App\Http\Controllers\backend;

use App\backend\kategorimodel;
use App\backend\sliderModels;
use App\Http\Controllers\Controller;
use App\User;
use Symfony\Component\Console\Input\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades;

class adminHomeController extends Controller
{
    public function show(){

        $sliderlistele = sliderModels::paginate(2);
        $sliderlistele->withPath(url('admin/yazılar/sayfa'));

        foreach ($sliderlistele as $item) {
            echo $item->slider_baslik."<br>";
        }

        echo $sliderlistele->links();

        $segment = Facades\Request::segments(1);

        print_r($segment);
    }

    public function anasayfapost(Request $request){

        $request->validate([
           "ad" => "required",
            "soyad"=>"required"
        ]);

        return redirect(route('.admin.anasayfapost'))->withInput();
    }

    public function nest(){

        $data = kategorimodel::where('parent_id',"0")->get();

        foreach ($data as $item) {
            echo $item->kategori_ad."<br>";
            $alt = $item->child()->where("parent_id",$item->kategori_id)->get();
            foreach($alt as $alt2){
                echo $alt2->kategori_ad."<br>";
            }
        }
    }

    public function loginx(){

        if(auth()->attempt(["email"=>"kaya1919@hotmail.com","password"=>"123"])){
            Session()->regenerate();
            echo "Giriş yaptık";
        }else{
            echo "SORUN VAR";
        }
    }


    public function loginxx(){

        if(auth::guard('yonetim')->attempt(["email"=>"kaya1919@hotmail.com","password"=>"123"])){

            Session()->regenerate();
            echo "Giriş yaptık";
        }else{
            echo "SORUN VAR";
        }
    }

    public function oturumkapa(){
        Auth()->logout();
        Auth::guard('yonetim')->logout();
        Session()->flush();
        Session()->regenerate();
        return redirect('admin/anasayfa');
    }

    public function denemecache(){

        $statislikler = [
            "sliderliste" =>DB::table('sliders')->get()
        ];
        if(!Facades\Cache::has('statislikler')) {
            $bitiszaman = now()->addMinutes(10);
            Facades\Cache::put('statislikler', $statislikler, $bitiszaman);

        }else{
            $statislikler = Facades\Cache::get("statislikler");
        }

        foreach ($statislikler['sliderliste'] as $key) {
            echo $key->slider_baslik . "<br>";
        }


    }

    public function databaseselect(){

        $veri = DB::table('sliders')->find(6);


        echo "<pre>";
        print_r($veri);
        echo "</pre>";

    }

    public function adminloginc(){
        echo "Admin Girişi Kontrolü fonksiyonu";
    }
}
