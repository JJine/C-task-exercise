<?php

namespace Jine\App;

class Route {
    private static $actions = []; //url링크와 처리할 컨트롤러가 셋트로 있는 배열 
    public static function route() 
    {
        // var_dump(self::$actions);
        $path = explode("?", $_SERVER['REQUEST_URI'])[0];
        //자기가 가지고 있는 주소중에서 $path 하고 일치하는 주소가 있는지를 찾아야한다.
        foreach(self::$actions as $action) {
            // var_dump($action);
            $url = preg_replace('/\//', '\/', $action[0]); //변환시키는 함수 
            $url = preg_replace('/\{([^{}]+)\}/', '([^\/]+)', $url);
            

            if(preg_match("/^{$url}$/", $path, $result)) {
                unset($result[0]);
                $urlAction = explode("@", $action[1]); //매서드와 클래스를 분리
                $controllerClass = "\\Jine\\Controller\\{$urlAction[0]}"; //Jine\Controller\MainController
                $controller = new $controllerClass();
                $controller->{$urlAction[1]}(...$result);
                // var_dump($urlAction);
                return;
            }
        }
        echo "404 NotFound";
    }

    //magic function
    public static function __callStatic($name, $args) 
    {
        $req = strtolower($_SERVER['REQUEST_METHOD']); //get, post, put, delete
        if($req == $name) {
            self::$actions[] = $args;
        }
    }
}