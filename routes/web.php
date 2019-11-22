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

Route::get('/', function () {
    return view('welcome');
});

//無名関数function(){} の中の設定のURLを http://XXXXXX.jp/admin/ から始まるURL にする
Route::group(['prefix' => 'admin'], function(){
//http://XXXXXX.jp/admin/news/create にアクセスが来たら、Controller Admin\NewsController のAction addに渡す 
//　middleware:ログインしていない状態でアクセスしようとしたときにログイン画面にリダイレクトする
    Route::get('news/create','Admin\NewsController@add') ->middleware('auth');
    Route::post('news/create','Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});

//課題3
Route::get('XXX','AAAController@bbb');

//課題4
Route::group(['prefix' => 'admin'], function(){
    Route::get('profile/create', 'Admin\ProfileController@add') ->middleware('auth') ;
    Route::get('profile/edit', 'Admin\ProfileController@edit') ->middleware('auth') ;
    Route::post('profile/edit', 'Admin\ProfileController@update') ->middleware('auth') ;
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile', 'Admin\ProfileController@index')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
