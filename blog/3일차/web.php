<?php

use Jine\App\Router;

Router::get("/", "MainController@index");
Router::post("/", "UserController@registerProcess");
Router::post("/user/login", "UserController@loginProcess");