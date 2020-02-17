<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class ListController {
    public function page() {
        include_once __SRC . "/view/header.php";
        include_once __SRC . "/view/ListPage.php";
    }

    public function pageProcess() {
        
    }
}
