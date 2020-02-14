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

    public function list($idx = 0) 
    {
        include_once __SRC . "/view/header.php";
        include_once __SRC . "/view/getList.php";
        // $user = user();
        // if(!$user->checkLogin()) {
        //     Lib::json(['success'=>false, 'msg'=>'로그인 후 시도하세요']);
        // } else {
        //     $sql = "SELECT * FROM posts WHERE userid = ? AND date >= NOW() LIMIT {$idx}, 6 = ?";
        //     $list = DB::fetchAll($sql, [$user->get()->id]);
        //     Lib::json(['success'=>true, 'list'=> $list]);
        // }
    } 
    public function delete($id) {
        $user = user();

        $sql = "SELECT * FROM posts WHERE userid = ? AND id = ?";
        $todo = DB::fetch($sql, [$user->get()->id, $id]);
    }
}