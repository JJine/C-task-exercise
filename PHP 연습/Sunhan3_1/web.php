<?php

use Jine\App\Route;

Route::get('/', 'MainController@index');
Route::get('/todo/getList', 'BoardController@list');
Route::get('/todo/getList/{idx}', 'BoardController@list');

if(user()->checkLogin()) {
    Route::get('/todo/write', 'BoardController@write');
    Route::post('/todo/write', 'BoardController@writeProcess');
    Route::get('/user/logout', 'UserController@logout');

    Route::get('/todo/del/{id}', 'BoardController@delete');
}else {
    Route::get('/user/register', 'UserController@register');
    Route::post('/user/register', 'UserController@registerProcess');
    Route::get('/user/login', 'UserController@login');
    Route::post('/user/login', 'UserController@loginProcess');
}
//route parameter 