<?php 

namespace Jine\Controller;

class MasterController 
{
    public function render(string $page, array $datas = []) {
        extract($datas);
        
        $this->decode("header");
        include_once __SRC . "/cache/header.php";
        $this->decode($page);
        include_once __SRC . "/cache/{$page}.php";
        $this->decode("footer");
        include_once __SRC . "/cache/footer.php";
        
    }

    public function decode($page) {
        $origin = __SRC . "/view/{$page}.php";
        $cache = __SRC . "/cache/{$page}.php";

        if(file_exists($cache)) {
            $cacheTime = filemtime($cache);
        }else {
            $cacheTime = false;
        }
        $originTime = filemtime($origin);
        // var_dump($cacheTime,$originTime);
        if($cacheTime === false || $cacheTime < $originTime){
            $content = file_get_contents($origin);



        if(strpos($page, "/") !== false) {
            $dir = dirname($cache);
            if(!file_exists($dir)) {
                mkdir($dir, 777, true);
            }
        }
        // exit;
        file_put_contents($cache, $content);
     }
    }
}