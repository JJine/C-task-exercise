<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class ListController{
    public function viewpage() {

        include_once __SRC."/view/header.php";
        include_once __SRC."/view/ListPage.php";
        include_once __SRC."/view/reply.php";
        include_once __SRC."/view/footer.php";
    }

    //글 뷰 
    public function pageProcess($idx = 0) {
        extract($_POST);
        $user = user();
        if(!$user->checkLogin()) {
            Lib::json(['success'=>false, 'msg'=>'로그인 후 시도하세요']);
        } else {
            $sql = "SELECT * FROM posts WHERE id = ? ";
            $data = DB::fetch($sql, [$id]);
            echo json_encode($data);
            red("ListPage", ["rows" => $data, "data" => $data]);
        }
    }

    //조회수
    public function numbers() {
        extract($_POST);

        $hit = "UPDATE `posts` SET view=view+1 WHERE id=$id";
        $result = DB::execute($hit);

        echo json_encode($hit);
    }
    
    public function comment() {
        extract($_POST);

        $sql = "INSERT INTO reply (`name`, `paw`, `con_content`, `date`, `postid`) VALUES (?,?,?,?,?)";
        $result = DB::execute($sql, [$name, $paw, $con_content, date("Y-m-d H:i:s"), $id] );
        
        
        echo json_encode($result);
        message($result);
        if($result != 1) {
            message ($result);
        } else {
            message ("성공적으로 작성이 완료되었습니다.");
        }
    }

    public function comList() {
        header("Content-Type","application/json");
        extract($_POST);

        $sql = "SELECT * FROM reply WHERE postid = ?";
        $com = DB::fetchAll($sql, [$id]);
        var_dump($com);
        // $id = 현재 view에 로드된 포스트의 아이디

    }

    public function viewPaging($id) {
        // post
        $sql = "SELECT U.user_name , P.* FROM users AS U , posts AS P WHERE P.id = ? AND U.id = P.userid";
        $post = DB::fetch($sql,[$id]);
        // comments
        $sql = "SELECT `idx`, `name`, `date`, `con_content`, `postid` FROM reply WHERE `postid` = ?";
        $comment = DB::fetchAll($sql,[$id]);
        if($post !== null){
            include_once __SRC . "/view/header.php";
            include_once __SRC . "/view/ListPage.php";
            include_once __SRC . "/view/reply.php";
            // include_once __SRC . "/view/footer.php";
            // 
        }
    }

    public function searchProcess() {
        extract($_GET);

        $keyword = isset($keyword) ? $keyword : "";
        $type = isset($type) ? $type : "";

        $where = "";
        $matches = [];
        if($keyword !== "") {
            $where .= " AND P.title LIKE ?";
            $matches[] = "%$keyword%"; 
        }

        // if($type !== "") {
        //     $where .= " AND P.type = ? ";
        //     $matches[] = $type;
        // }

        $sql = "SELECT P.*, U.user_name, U.id FROM posts P, users U WHERE P.userid = U.id ";
        $sql .= $where !== "" ?  $where : "" ;
        
        $data = DB::fetchAll($sql, $matches); //AS 생략 가능
    }
}