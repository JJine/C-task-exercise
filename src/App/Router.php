<?php 

//namespace가 들어온다 
namespace App;

class Router {
    static $get = []; //new Array = array();
    static $post = [];

    static function get($url, $controller) {

        //형 강제변형 (string) (number) (object) (array)
        // $number = 100;
        // $string = (string)$number;

        array_push(self::$get,
        (object)[
            "url"=> $url, 
            "controller" => $controller //객체로 저장
            ]
        ); //배열을 추가할려면 이 함수를 써야함 (점이라는 개념이 없다.), 파라미터를 계속 생성 가능
    }
    
    static function post($url, $controller) {
        array_push(self::$post, 
        (object)[
            "url"=> $url, 
            "controller" => $controller
            ]
        ); 
    }

    /**
     * 현재 URL과 GET, POST 배열 내에 요소를 비교해서 
     * 페이지를 찾는다. => 컨트롤러의 메소드를 실행시킨다.
     */
    static function redirect() { 
       //isset : 배열이 있는지 없는지 확인
       $url = isset($_GET['url']) ? "/".$_GET['url'] : "/";

       //strtolower 강제로 소문자로 변환
       $method = strtolower($_SERVER['REQUEST_METHOD']);

       //${$method} get이라면 get 들어감 (변수로 변함) -> static $get으로 넘어감
       //$page 어떤 변수로 들어가야할지 넣은 부분
       foreach(self::${$method} as $page) {
            if($page->url === $url) { 
                // 0 : 컨트롤러, 1 : 메소드
                $split = explode("@", $page->controller); //자바스크립트 split 함수로 대처
                $conName = "Controller\\".$split[0];
                $controller = new $conName();
                $controller->{$split[1]}();
                exit;
            } //이스케이프가 들어가야하기 때문에 백슬래시를 2번해준다.
       }
       echo "이 페이지는 존재하지 않는 페이지입니다.";
    }
}