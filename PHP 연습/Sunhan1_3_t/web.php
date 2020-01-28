<?php

use Jine\App\Router;

Router::get('/board/view/{index}', 'BorderController@view');
Router::get('/board', 'BorderController@index');
Router::get('/', 'MainController@index');

