<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class BoardController {
    public function write() {
        include_once __SRC . "/view/write.php";
    }   

    public function writeProcess() {
        extract($_POST);
        // $dateTime = $date . " " . ($time == ""  ? "00:00:00" : $time . ":00");

        // if($title == "" || $content = "" ) {
        //     echo ""
        // }
        $sql = "INSERT INTO posts (`userid`, `title`, `sub_title`, `category`, `content`, `date`) VALUES (?,?,?,?,?,?) ";
        $result = DB::execute($sql, [user()->get()->id, $title, $sub_title, $category, $content, date("Y-m-d H:i:s") ]);

        
        // $result = [ $title, $sub_title, $category, $content];
        if($result != 1) {
            message ($result);
        } else {
            message ("성공적으로 작성이 완료되었습니다.");
        }
    }

    public function getListpage() {
        include_once __SRC ."/view/header.php";
        include_once __SRC ."/view/getList.php";
    }
    public function list($idx = 0) 
    {

        $user = user();
        if(!$user->checkLogin()) {
            Lib::json(['success'=>false, 'msg'=>'로그인 후 시도하세요']);
        } else {
            $sql = "SELECT * FROM posts WHERE userid = ? LIMIT {$idx}, 9";
            $list = DB::fetchAll($sql, [$_SESSION['user']->id]);
            echo json_encode($list);
            // Lib::json(['success'=>true, 'list'=>$list]);
        }
    } 
    public function delete() {
        header("Content-Type","application/json");
        extract($_GET);
        // echo ($id);
        // exit;
        $user = user();

        $sql = "SELECT * FROM posts WHERE userid = ? AND id = ?";
        $todo = DB::fetch($sql, [$_SESSION['user']->id, $id]);

        if($todo == null) {
            echo json_encode($todo);
        }
        $sql = "DELETE FROM posts WHERE id = ?";
        $result = DB::execute($sql, [$id]);
        echo json_encode($result);
    }
}