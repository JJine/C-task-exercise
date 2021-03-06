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
Router::get("/schedule-add", "ScheduleController@scheduleAddPage");
Router::post("/schedule-add", "ScheduleController@scheduleAddProcess");
Router::post("/schedule/get", "ScheduleController@scheduleGetProcess");
Router::get("/schedule-detail", "ScheduleController@detailPage");

//Search
Router::get("/search", "MovieController@searchPage");
Router::post("/search", "MovieController@searchProcess");

//Event
Router::get("/parti", "MovieController@partiPage");
Router::post("/parti", "MovieController@partiProcess");

Router::get("/contest", "MovieController@contestPage");
Router::get("/contest-info", "MovieController@contestInfoPage");
Router::post("/contest-info", "MovieController@contestInfoProcess");

//User
Router::get("/join", "UserController@joinPage");
Router::post("/join", "UserController@joinProcess");

Router::get("/login", "UserController@loginPage");
Router::post("/login", "UserController@loginProcess");

Router::get("/logout", "UserController@logoutProcess");

Router::redirect();



