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

//用户管理api
Route::post('api/user/getdata','Api\UserController@getData');
//Route::get('api/user/getdata','Api\UserController@getData');
Route::post('api/user/detail','Api\UserController@detail');
Route::post('api/user/edit','Api\UserController@edit');
Route::post('api/user/delete','Api\UserController@delete');
Route::post('api/user/add','Api\UserController@add');

//博客增删改查api
Route::post('api/article/getdata','Api\ArticleController@getData');
//Route::get('api/article/getdata/{search}','Api\ArticleController@getData');
Route::post('api/article/detail','Api\ArticleController@detail');
Route::post('api/article/add','Api\ArticleController@add');
Route::post('api/article/delete','Api\ArticleController@delete');