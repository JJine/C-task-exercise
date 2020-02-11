<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class ListController extends MasterController {
    public function list() {
        $this->view("list");
    }
}
