<?php

use Jine\App\Router;
Router::get("/", "MainController@index");


if(user()->checkLogin()) {
    Router::post("/logout", "UserController@logoutProcess");
    Router::get("/write", "BoardController@write");
    Router::post("/write", "BoardController@writeProcess");
}else {
    Router::post("/register", "UserController@registerProcess");
    Router::post("/login", "UserController@loginProcess");
}

Router::redirect();

