<?php

function classLoader($className) {
    $classPath = ROOT."/src/$className.php";
    
    if(is_file("$classPath"))  
        include $classPath; //namespace를 사용하는 이유는 파일경로를 호출하기 위함
    
}

/*
    이 함수가 실행된 이후 클래스를 호출할 때 
    실행되는 함수
*/
spl_autoload_register("classLoader"); //"" 문자열로 들어가기 때문에 classLoader라고 쓰면 에러남

