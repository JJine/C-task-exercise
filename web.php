<?php

/**
 * 사용할 페이지들의 집합 (화면상 보여지는 웹 페이지)
 * eX) sub1, sub2
 * Router랑 Controller를 연결하는 역할 
 */


//use : 해당 클래스를 이 파일에서 사용하겠다고 선언 => autoload.php로 연결됨
use App\Router;

//$router->get();

//Main
Router::get("/", "MainController@indexPage"); // "" , ""  indexPage 메소드

//Entry
Router::get("/entry", "MovieController@entryPage");
Router::post("/entry", "MovieController@entryProcess");

//Schedule
Router::get("/schedule", "ScheduleController@schedulePage");
//User
Router::get("/join", "UserController@joinPage");
Router::post("/join", "UserController@joinProcess");

Router::get("/login", "UserController@loginPage");
Router::post("/login", "UserController@loginProcess");

Router::get("/logout", "UserController@logoutProcess");

Router::redirect();



