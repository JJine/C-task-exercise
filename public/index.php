<?php
session_start();

                                /**
                                 * 상수선언
                                 */
// define(상수 이름, 값 (내용)) : 상수선언 
define("ROOT",dirname(__DIR__)); // __DIR__ : 현재 이 파일 경로
                                 // dirname(파일 경로) : 부모 디렉토리를 가져오기 
define("VIEW", ROOT."/src/View"); //상수로 선언 

                                 /**
                                 * 파일 가져오기 
                                 */

include ROOT."/autoload.php";
include ROOT."/helper.php";
include ROOT."/web.php";

