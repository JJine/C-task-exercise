<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class BoardController {
    public function write() {
        include_once __SRC . "/view/write.php";
    }   

    public function writeProcess() {
        extract($_POST);

        $sql = "INSERT INTO posts (userid, title, sub_title, category, content, image, date) VALUES (?,?,?,?,?,?,?) ";
        $cnt = DB::query($sql, [session()->$userid, $title, $sub_title, $category, $content, $image, date("Y-m-d H:i:s") ]);

    }
}