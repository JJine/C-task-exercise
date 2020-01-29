<?php 

    session_start();

    function session() {
        return new \Jine\App\Session();
    }
    
    define("__ROOT", dirname( __DIR__));
    define("__SRC", __ROOT . "/src");

    include_once __ROOT . "/autoload.php";
    include_once __ROOT . "/web.php";

    Jine\App\Route::route(); //스태틱 메소드를 실행할려고 함 
    // $urls = explode("?", $_SERVER['REQUEST_URI']);
    // echo $urls[0];
