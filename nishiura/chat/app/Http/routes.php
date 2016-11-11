<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
  * デフォルトルート
  */
Route::get('/', function () {
    return view('top');
});

/**
  * トップページに戻る
  */
Route::get('top', function(){
  return view('top');
});

/**
  * ユーザーコントローラー
  **/
Route::post('userCreate', 'UserController@initialize')->name('userCreateInitialize');
Route::get('userCreate', 'UserController@initialize')->name('userCreateError');
Route::post('userRegist', 'UserController@regist')->name('userRegist');
Route::get('existsUser', 'UserController@exists')->name('userExists');

/**
  * ログインコントローラー
  **/
Route::post('login', 'LoginController@login');
