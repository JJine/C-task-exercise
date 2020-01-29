<?php 

function myLoader($name) {
    //기능대회에서는 만들어 쓰는게 맞으며 현업에서는 composer(npm like package manager)가 만들어준다.
    $prefix = "Jine\\";
    $base_dir = __DIR__ . "/src/";
    $prefixLen = strlen($prefix);

    if(strncmp($prefix, $name, $prefixLen) == 0) {
        //여기에 들어왔다라는 것은 클래스 이름이 Jine\로 시작되는 것
        //클래스 이름에서 Prefix 길이만큼 잘라낸다.
        //ex) Jine\App=DB => App\DB만 남는다.
        $realName = substr($name, $prefixLen);
        $realName = str_replace("\\", "/", $realName);

        $file = "{$base_dir}{$realName}.php";
        if(file_exists($file)) {
            include_once $file;
        }
    }
    // include_once "./src/{$name}.php"; //문자열로 치환해서 들어간다.
}

spl_autoload_register("myLoader");