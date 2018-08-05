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

Route::get('/', ['as' => 'home', 'uses' => 'ArticlesController@home']);

Route::group(['prefix' => 'articles'], function() {
	Route::get('/', ['as' => 'articles', 'uses' => 'ArticlesController@home']);
	Route::get('archives', ['as' => 'articles.archive', 'uses' => 'ArticlesController@archive']);
	Route::get('{id}', ['as' => 'articles.view', 'uses' => 'ArticlesController@view']);
	Route::post('create', ['as' => 'articles.create', 'uses' => 'ArticlesController@create']);
});

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', ['as' => 'admin.articles', 'uses' => 'AdminController@articles']);
	Route::get('create', ['as' => 'admin.articles.create', 'uses' => 'AdminController@create']);
	Route::post('create', ['as' => 'admin.articles.postCreate', 'uses' => 'AdminController@postCreate']);
	Route::get('login', ['as' => 'admin.login', 'uses' => 'AdminController@login']);
	Route::post('login', ['as' => 'admin.postLogin', 'uses' => 'Auth\LoginController@login']);
	Route::get('/{id}', ['as' => 'admin.articles.view', 'uses' => 'AdminController@view']);
	Route::patch('/{id}', ['as' => 'admin.articles.postUpdate', 'uses' => 'AdminController@postUpdate']);
	Route::get('/{id}/edit', ['as' => 'admin.articles.edit', 'uses' => 'AdminController@edit']);
});