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

//�ǉ�///////////////////////////////////////////
//�e�X�g���
Route::get('/test', function () {
    //return public_path();
    return File::get(public_path() . '\test.html');
});

//Route::get('/test', 'TestController@index');


//�Z�b�V�����̗��p
Route::group(['middleware' => \Illuminate\Session\Middleware\StartSession::class], function () {

	//�o���f�[�V�������p
	Route::group(['middleware' => \Illuminate\View\Middleware\ShareErrorsFromSession::class], function(){
		//���i�o�^���
		Route::get('/add', function () {
			return view('add');
		});
		Route::post('/add', 'AddController@postIndex');
	});

	//���i�������
	Route::get('/list', function () {
		return view('list');
	});
	Route::group(['prefix' => 'list'], function() {
		//���i����
		Route::get('/findItem', function() {
			return redirect('/list');
		});
		Route::post('/findItem', 'ListController@postFindItem');
		//���i�폜
		Route::post('/deleteItem', 'ListController@postDeleteItem');
	});

	//�X�V��ʂɑJ��
		Route::get('/edit', function() {
		return redirect('/list');
	});
	Route::post('/edit', 'EditController@postEditItem');
	//�X�V�������s��
	Route::get('/edit/update', function() {
		return redirect('/list');
	});
	Route::post('/edit/update', 'EditController@postUpdateItem');
});
