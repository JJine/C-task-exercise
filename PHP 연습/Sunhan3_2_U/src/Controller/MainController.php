<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class MainController extends MasterController
{
    public function index() {
    // $list = [];
    // if(user()->checkLogin()) {
    //     $sql = "SELECT * FROM todos WHERE owner= ? AND date >= NOW() ORDER BY date LIMIT 0, 5";
    //     $list = DB::fetchAll($sql, [user()->get()->id]);
    // }
    
    $this->render("main");
    }
}