<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Backend Route */
require base_path('routes/backend/web.php');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/y',function (){
    $get = request("name");
    echo $get;
});

Route::get('/halildavar',function (){
    echo "Test";
});

 Route::get('/kocamemeli-melisa',function (){
    echo "Test";
});

Route::get('/delime-nea',function (){
    $get = request("name");
    echo $get;
});
