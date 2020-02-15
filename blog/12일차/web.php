<?php

use Jine\App\Router;
Router::get("/", "MainController@index");
Router::get("/getList", "BoardController@list");
Router::get("/getList/{idx}", "BoardController@list");


if(user()->checkLogin()) {
    Router::post("/logout", "UserController@logoutProcess");
    
    Router::get("/write", "BoardController@write");
    Router::post("/write", "BoardController@writeProcess");
    
    Router::get("/del/{id}", "BoardController@delete");
}else {
    Router::post("/register", "UserController@registerProcess");
    Router::post("/login", "UserController@loginProcess");
}

Router::redirect();

