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

//追加///////////////////////////////////////////
//テスト画面
Route::get('/test', function () {
    //return public_path();
    return File::get(public_path() . '\test.html');
});

//Route::get('/test', 'TestController@index');


//セッションの利用
Route::group(['middleware' => \Illuminate\Session\Middleware\StartSession::class], function () {

	//バリデーション利用
	Route::group(['middleware' => \Illuminate\View\Middleware\ShareErrorsFromSession::class], function(){
		//商品登録画面
		Route::get('/add', function () {
			return view('add');
		});
		Route::post('/add', 'AddController@postIndex');
	});

	//商品検索画面
	Route::get('/list', function () {
		return view('list');
	});
	Route::group(['prefix' => 'list'], function() {
		//商品検索
		Route::get('/findItem', function() {
			return redirect('/list');
		});
		Route::post('/findItem', 'ListController@postFindItem');
		//商品削除
		Route::post('/deleteItem', 'ListController@postDeleteItem');
	});

	//更新画面に遷移
		Route::get('/edit', function() {
		return redirect('/list');
	});
	Route::post('/edit', 'EditController@postEditItem');
	//更新処理を行う
	Route::get('/edit/update', function() {
		return redirect('/list');
	});
	Route::post('/edit/update', 'EditController@postUpdateItem');
});
