<?php

use Jine\App\Route;

Route::get('/board/view/{index}', 'BoardController@view');
Route::get('/board', 'BoardController@index');
Route::get('/', 'MainController@index');

Route::get('/user/register', 'UserController@register');
Route::post('/user/register', 'UserController@registerProcess');

if(isset($_SESSION['user'])) {
    Route::get('/user/logout', 'UserController@logout');
    Route::get('/todo/write', 'TodoController@write');
    Route::post('/todo/write', 'TodoController@writeProcess');
}

Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@loginProcess');


//route parameter 