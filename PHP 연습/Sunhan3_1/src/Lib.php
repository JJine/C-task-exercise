<?php

namespace Jine;

class Lib {
    public static function dump($var) {
        echo "<div style='width:450px; box-shadow: 2px 2px 5px #ddd;'>";
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        echo "</div>";
    }
} //static - 변수로 할당시킨다. 

// Lib::dump($var);