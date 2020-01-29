<?php

namespace Jine\Controller;

class MasterController
{
    public function render(string $page, array $datas = [] ) 
    {
        extract($datas);
        $head = include_once __SRC . "/views/header.php";

        $origin = __SRC . "/views/{$page}.php";
        $cache = __SRC . "/cache/{$page}.php";

        if(file_exists($cache)) {
             $cacheTime = filemtime($cache);
        } else {
            $cacheTime = false;
        }
        $originTime =filemtime($origin);
       

        //단락회로 연산 => Short curicuit evalution
        if($cacheTime == false || $cacheTime < $originTime) {
            $content = file_get_contents($origin, $head); //파일 읽어서 불러옴 
            // include_once __SRC . "/views/{$page}.php";
            $content = preg_replace('/\{\{([^{}]+)\}\}/', '<?= $1 ?>', $content);
            $content = preg_replace('/@((if|foreach|for|while|elseif)\(.+\))/', '<?php $1: ?>', $content);
            $content = preg_replace('/@(else)/', '<?php $1: ?>', $content);
            $content = preg_replace('/@(end(if|foreach|for|while|for))/', '<?php $1 ?>', $content);
            $content = preg_replace('/@(php)/', '<?php ', $content);
            $content = preg_replace('/@(endphp)/', '?>', $content);
            

            if(strpos($page, "/") !== false) {
                //지정된 페이지에 경로에 존재하면 (즉 디렉토리를 생성해야 한다면)
                $dir = dirname($cache);
                if(!file_exists($dir)) {
                    mkdir($dir, 777, true);
                }    
            }
            file_put_contents($cache, $content, $head);
        }
        
        

        include_once($cache);
        include_once __SRC . "/views/footer.php";
    }
}