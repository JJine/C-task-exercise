<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class BoardController extends MasterController {
    public function write() {
        include_once __SRC . "/view/write.php";
    }   

    public function writeProcess() {
        
    }
}