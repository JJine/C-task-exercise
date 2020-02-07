<?php

use Jine\App\Router;
Router::get("/", "MainController@index");
Router::post("/register", "UserController@registerProcess");
Router::post("/login", "UserController@loginProcess");
Router::post("/", "UserController@logoutProcess");

Router::get("/edit/write", "BoardController@write");
Router::post("/edit/write", "BoardController@writeProcess");