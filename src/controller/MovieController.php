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
    
}