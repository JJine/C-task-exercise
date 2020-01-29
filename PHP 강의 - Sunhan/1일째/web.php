<?php

use Jine\App\Route;

Route::get('/board/view/{index}', 'BoardController@view');
Route::get('/board', 'BoardController@index');
Route::get('/', 'MainController@index');


//route parameter 