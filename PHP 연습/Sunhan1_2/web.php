<?php 

use Jine\App\Router;

Router::get('/board/view/{index}', 'BoardController@view');
Router::get('/board', 'BoardController@index');
Router::get('/', 'MainController@index');