<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/itemEntry', 'ItemEntryController@getIndex');
Route::post('/add', 'ItemEntryController@add');
Route::get('/itemList', 'ItemListController@getIndex');
Route::post('/search', 'ItemListController@search');
Route::get('/edit', 'ItemListController@edit');
Route::post('/update', 'ItemUpdateController@update');
Route::get('/delete', 'ItemDeleteController@delete');
Route::get('/view', 'ItemViewController@view');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
