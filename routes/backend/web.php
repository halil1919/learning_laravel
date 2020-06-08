<?php

Route::get('/admin/giris','backend\adminHomeController@adminloginc')->name('admin.giris');

Route::group(['prefix'=>"admin","as"=>".admin","namespace"=>"backend","middleware"=>"ynt"],function (){

        Route::get('/anasayfa','adminHomeController@show')->name('.anasayfa');

        Route::get('/yazılar/sayfa','adminHomeController@show')->name('.anasayfa');

        Route::post('/anasayfa','adminHomeController@anasayfapost')->name('.anasayfapost');

        Route::get('/girisdene','adminHomeController@loginx')->name('.lgn');

        Route::get('/cachedeneme','adminHomeController@denemecache')->name('.dnmcache');

        Route::get('/databaseselect','adminHomeController@databaseselect')->name('.databaseselect');

        Route::get('/girisdeneg','adminHomeController@loginxx')->name('.lgnx');

        Route::get('/oturumkapa','adminHomeController@oturumkapa')->name('.oturumkapa');

        Route::get('/nest','adminHomeController@nest')->name('.anasayfax');


        Route::group(['prefix'=>"slider","as"=>".slider","middleware"=>"ynt"],function (){
            Route::get('/','sliderController@show')->name('.anasayfa');
            Route::get('/sliderekle','sliderController@showformadd')->name('.addform');
            Route::post('/sliderekle','sliderController@sliderinsertdata')->name('.insertform');

            Route::get('/sliderdüzenle/{id}','sliderController@updateshowform')->name('.sliderdüzenle');
            Route::post('/sliderdüzenle/{gelenid}','sliderController@updateformdata')->name('.dataupdate');

            Route::get('/sil/{id}','sliderController@slidersil')->name('.slidersil');
        });

        Route::group(["prefix"=>"kurumsal","as"=>".kurumsal","middleware"=>"auth"],function (){
            Route::get('/','kurumsalController@show')->name('.anasayfa');
            Route::get('/kurumsal-ekle','kurumsalController@ekleformshow')->name('.kurumsalekleform');
            Route::post('/kurumsal-ekle','kurumsalController@insertdata')->name('.kurumsalekleforminsert');
        });

        Route::group(['prefix'=>"projekategori","as"=>".projekategori"],function (){
            Route::get('/','projeKategoriController@show')->name('.anasayfa');
        });

});
