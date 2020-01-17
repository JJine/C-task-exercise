<?php
namespace Controller;

use App\DB;

class MovieController {
    function entryPage() {
        if(!isset($_SESSION['user'])) 
            return back("비회원을 접근할 수 없습니다.");
        view("entry");
    }

    function entryProcess() {
        extract($_POST);

        $data = [$_SESSION['user']->id, $title, $running_time, $created_at, $type];
        DB::query("INSERT INTO entry(u_id, title, running_time, created_at, type) VALUES (?,?,?,?,?)", $data);

        go("/", "출품 신청이 완료되었습니다.");
    }

    function searchPage() {
        extract($_GET);

        $keyword = isset($keyword) ? $keyword : "";
        $type = isset($type) ? $type : "";

        $where = "";
        $matches = [];
        if($keyword !== "") {
            $where .= " AND E.title LIKE ?"; //중괄호쓰면 변수 배열값이 자동으로 들어간다 양옆에 다르더라도! {} 빼도 무관하다. %{keyword}% = ? prepare 상태여야한다.
            $matches[] = "%$keyword%"; // array_push()와 동일하며 속도는 이 라인이 더 빠르다.
            // array_push($matches, "%$keyword%");
        }

        if($type !== "") {
            $where .= " AND E.type = ? ";
            $matches[] = $type;
        }

        $sql = "SELECT E.*, U.user_name, U.user_id FROM entry E, users U WHERE E.u_id = U.id ";
        $sql .= $where !== "" ?  $where : "" ;
        
        $data = DB::fetchAll($sql, $matches); //AS 생략 가능
        view("search", ["movies" => $data, "keyword" => $keyword, "type"=>$type]);
    }
    
}