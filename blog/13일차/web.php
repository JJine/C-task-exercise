<?php

use Jine\App\Router;
Router::get("/", "MainController@index");
Router::get("/getList", "BoardController@getListpage");
Router::post("/getList/{idx}", "BoardController@list");
Router::get("/ListPage", "ListController@page");
Router::post("/ListPage", "ListController@pageProcess");

if(user()->checkLogin()) {
    Router::post("/logout", "UserController@logoutProcess");
    
    Router::get("/write", "BoardController@write");
    Router::post("/write", "BoardController@writeProcess");
    
    Router::get("/del", "BoardController@delete");
}else {
    Router::post("/register", "UserController@registerProcess");
    Router::post("/login", "UserController@loginProcess");
}

