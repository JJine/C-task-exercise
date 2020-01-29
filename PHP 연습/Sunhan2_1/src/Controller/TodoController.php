<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class TodoController extends MasterController {
    public function write() {
        $this->render("todo/write");
    }

    public function writeProcess() {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $content = $_POST['content'];

        // if($title == "" || $date == "" || $content == "") {
        //     Lib::redirect("/todo/write", "필수 값이 비어있습니다.");
        //     return;
        // }
       
        $datetime = $date . " " . ($time == "" ? "00:00:00" : $time . ":00");
        $user = $_SESSION['user']['id'];

        $sql = "INSERT INTO todos(`title`, `content`, `owner`, `date`) VALUES (?, ?, ?, ?)";
        $cnt = DB::execute($sql, [$title, $content, $user, $datetime]);
    
        if($cnt != 1) {
            Lib::redirect("/todo/write", "데이터 입력 도중에 오류가 발생하였습니다.");
            return;
        } else {
            Lib::redirect("/", "성공적으로 입력되었습니다.");
            return;
        }
    }
}