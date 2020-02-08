<?php 

namespace Jine\Controller;

class MasterController 
{
    public function view($page, $data = []) {
        extract($data);
        // extract($_POST);
        $page = __SRC."/view/$page.php";
        include_once __SRC."/view/header.php";
        include_once $page;
        
        include_once __SRC."/view/footer.php";
    }


    // public function render(string $page, array $datas = []) {
        
    //     extract($datas);
    //     $head = include_once __SRC . "/view/header.php";
    //     $content2 = include_once __SRC . "/view/{$page}.php";
    //     $origin = __SRC . "/view/{$page}.php";
    //     $cache = __SRC . "/cache/{$page}.php";

    //     if(file_exists($cache)) {
    //         $cacheTime = filemtime($cache);
    //     } else {
    //         $cacheTime = false;
    //     }
    //     $originTime = filemtime($origin);

    //     if($cacheTime == false || $cacheTime < $originTime) {
    //         $content = file_get_contents($origin, $head);

    //         if(strpos($page, "/") !== false) {
    //             $dir = dirname($cache);
    //             if(!file_exists($dir)) {
    //                 mkdir($dir, 777, true);
    //             }
    //         }
    //         file_put_contents($cache, $content, $head);
    //     }
        // $this->decode("header");
        // include_once __SRC . "/cache/header.php";
        // $this->decode($page);
        // include_once __SRC . "/cache/{$page}.php";
        // $this->decode("footer");
        // include_once __SRC . "/cache/footer.php";
        // include_once($cache);
        // include_once __SRC . "/view/footer.php";
    }

//     public function decode($page) {
//         // $origin = __SRC . "/view/{$page}.php";
//         // $cache = __SRC . "/cache/{$page}.php";

//         // if(file_exists($cache)) {
//         //     $cacheTime = filemtime($cache);
//         // }else {
//         //     $cacheTime = false;
//         // }
//         // $originTime = filemtime($origin);
//         // // var_dump($cacheTime,$originTime); 

//         // if($cacheTime === false || $cacheTime < $originTime){
//         //     $content = file_get_contents($origin, $head);
           
        
//         //     if(strpos($page, "/") !== false) {  
//         //         $dir = dirname($cache);
//         //         if(!file_exists($dir)) {
//         //             mkdir($dir, 777, true);
//         //         }
//         //     }
//         // // exit;

//         // file_put_contents($cache, $content);
        
//         // }
//     }
// }