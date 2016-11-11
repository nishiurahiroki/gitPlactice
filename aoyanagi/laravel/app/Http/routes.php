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

Route::get('item', 'itemController@itemGet');
Route::post('item', 'itemController@itemPost');


/*

Route::get('item_vi', 'itemController@item_vi');
Route::get('item_conf',  'itemController@item_conf');

Route::group(array('before' => 'csrf'), function()
{
    Route::post('item_conf',  'itemController@item_conf');
    Route::post('item_complete', 'itemController@item_complete');
});


Route::get('item_vi', 'itemController@item_vi');
Route::post('item_vi','itemController@item_conf');
Route::get('item_conf', 'itemController@item_conf');
Route::post('item_complete','itemController@item_complete');

*/

