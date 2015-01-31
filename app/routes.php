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
	]);
	Route::put('{id}/title', [
		'as' => 'todos.update-title',
		'uses' => 'TodosController@ajaxUpdateTitle',
	]);

	Route::post('{id}/delete', [
		'as' => 'todos.delete',
		'uses' => 'TodosController@delete',
	]);

	Route::post('{id}/restore', [
		'as' => 'todos.restore',
		'uses' => 'TodosController@restore',
	]);
});
