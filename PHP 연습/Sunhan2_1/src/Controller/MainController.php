<?php

namespace Jine\Controller;

use Jine\App\DB;

class MainController extends MasterController
{
    public function index() {
        $list = [];
        if(isset($_SESSION['user'])) {
            var_dump($_SESSION['user']['id']);
            $sql = "SELECT * FROM `todos` WHERE `owner` = ? "; 
            $list = DB::fetchAll($sql, [$_SESSION['user']['id']]);
           
        }
        $this->render("main", ['list'=>$list]);
    }
}