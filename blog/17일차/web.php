<?php

use Jine\App\Router;
Router::get("/", "MainController@index");

//글 리스트
Router::get("/getList", "BoardController@getListpage");
Router::post("/getList/{idx}", "BoardController@list");

//조회수
Router::get("/getList", "ListController@Numbers");

//글 댓글 
Router::post("/reply", "ListController@comment");

//글 뷰 
// Router::get("/ListPage", "ListController@viewpage");
Router::post("/ListPage{idx}", "ListController@pageProcess");
Router::get("/view/{id}","ListController@viewPaging");
Router::post("/view{id}", "ListController@viewPagingProcess");

//글 검색 
Router::get("/search", "MainController@searchProcess");

if(user()->checkLogin()) {
    //로그아웃 
    Router::post("/logout", "UserController@logoutProcess");
    
    //글 쓰기
    Router::get("/write", "BoardController@write");
    Router::post("/write", "BoardController@writeProcess");
    
    //글 삭제
    Router::get("/del", "BoardController@delete");
}else {
    //회원가입, 로그인
    Router::post("/register", "UserController@registerProcess");
    Router::post("/login", "UserController@loginProcess");
}

