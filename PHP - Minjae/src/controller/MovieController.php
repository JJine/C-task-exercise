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

    function partiPage() {
        view("parti");
    }

    function partiProcess() {
        extract($_POST);

        if(!isset($_SESSION['user'])) return go("/login", "로그인 후 이용하실 수 있습니다.");

        DB::query("INSERT INTO teasers(movie_id, html, u_id) VALUES (?,?,?)", [$movie_id, $html, $_SESSION['user']->id]);
        return go("/contest", "참가가 완료되었습니다.");
    }

    function contestPage(){
        //평점 총합 / 명점을 매긴 사람들의 수 
        $scoreSQL = "SELECT t_id, SUM(score) / COUNT(score) AS score FROM goodList GROUP BY t_id";

        $data = DB::fetchAll("SELECT T.*, U.user_name, G.score 
                              FROM teasers AS T 
                              LEFT JOIN ($scoreSQL) AS G ON G.t_id = T.id, users AS U 
                              WHERE T.u_id = U.id");
        
        view("contest", ["teasers" => $data]);
    }



    function contestInfoPage() {
        $id = isset($_GET['id']) ? $_GET['id'] : "";

        $scoreSQL = "SELECT t_id, SUM(score) / COUNT(score) AS score FROM goodList GROUP BY t_id";

        $data = DB::fetch("SELECT T.*, U.user_name, G.score 
                           FROM teasers AS T 
                           LEFT JOIN ($scoreSQL) AS G ON G.t_id = T.id, users AS U 
                           WHERE T.u_id = U.id", [$id]);
        if(!$data) return back("해당 영상이존재하지 않습니다.");

        view("contest-info", ["teaser" => $data]);
        
    }

    function contestInfoProcess() {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $data = DB::fetch("SELECT T.*, U.user_name FROM teasers AS T, users AS U WHERE T.u_id = U.id", [$id]);
        if(!$data) return back("해당 영상이존재하지 않습니다.");
        if(!isset($_SESSION['user'])) return go("/login", "로그인 후 이용하실 수 있습니다.");

        extract($_POST);

        if(DB::fetch("SELECT * FROM goodList WHERE t_id = ? AND u_id = ?", [$id, $_SESSION['user']->id] )) {
            DB::query("UPDATE goodList SET score = ? WHERE t_id =? AND u_id = ? ", [$score, $id, $_SESSION['user']->id]);
        }
        else DB::query("INSERT INTO goodList(t_id, u_id, score) VALUES (?,?,?)", [$id, $_SESSION['user']->id, $score]);

        return go("/contest-info?id=$id");
        
    }
    
}