<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return Redirect::route('todos.index');
});

Route::when('*', 'csrf', ['post']);
// MEMO URLのパターンでフィルタを指定することもできる。
// MEMO filter.php内の'todos.exists'フィルタ定義を有効にすること。
//Route::when('todos/*', 'todos.exists', ['post', 'put']);

Route::group(['prefix' => 'todos'], function() {
	Route::get('', [
		'as' => 'todos.index',
		'uses' => 'TodosController@index',
	]);

	Route::post('', [
		'as' => 'todos.store',
		'uses' => 'TodosController@store',
	]);

	Route::post('{id}/update', [
		'as' => 'todos.update',
		'uses' => 'TodosController@update',
		// MEMO ルート単位のフィルタは’before', 'after'で指定する。
		// MEMO filter.php内の'todos.exists'フィルタ定義を有効にすること。
//		'before' => 'todos.exists',
	]);
	Route::put('{id}/title', [
		'as' => 'todos.update-title',
		'uses' => 'TodosController@ajaxUpdateTitle',
//		'before' => 'todos.exists',
	]);

	Route::post('{id}/delete', [
		'as' => 'todos.delete',
		'uses' => 'TodosController@delete',
//		'before' => 'todos.exists',
	]);

	Route::post('{id}/restore', [
		'as' => 'todos.restore',
		'uses' => 'TodosController@restore',
//		'before' => 'todos.exists',
	]);
});
