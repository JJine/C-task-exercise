<?php
namespace Controller;

use App\DB;

class UserController {
    function joinPage() {
        view("join");
    }

    function joinProcess() {
        extract($_POST);
        // if(!preg_match("/[^@]+@[a-z]+\.[a-z]{2,4}/", $user_id)) 
        // return back("아이디는 이메일 형식이여야 합니다.");
        //영문 or 영문 숫자 조합
        //비밀번호 8자리 이상
        //이름 4글자 이하
        
        if(!preg_match("/^[a-zA-Z0-9]+$/", $user_id) || preg_match("/^[0-9]+$/", $user_id)||preg_match("/[^@]+@[a-z]+\.[a-z]{2,4}/", $user_id)) ///^?=.*[a-zA-z])(
            return back("아이디는 영문 숫자조합이어야 합니다.");
        if(!preg_match("/^.{8,}$/", $password)) // mb_strlen() 굳이 preg_match 안 써도 됨 if(mb_strlen($user_id) < 8) 
            return back("비밀번호 8자리여야합니다.");
        if(!preg_match("/^[ㄱ-ㅎㅏ-ㅣ가-힣]{1,4}$/", $user_name))
            return back("이름이 4글자 이하여야 합니다.");
        if($password !== $passconf) 
            return back("비밀번호가 일치하지 않습니다");
        
        $password = hash("sha256", $password); //해싱 : 복구가 불가능
        DB::query("INSERT INTO users(user_id, user_name, password) VALUES (?, ?, ?)", [$user_id, $user_name, $password]); //작은 따음표 안해도 됨
        
        return go("/login", "회원가입 되었습니다.");
    }

    function loginPage() {
        view("login");
    }

    function loginProcess() {
        extract($_POST);
        
        $find = DB::fetch("SELECT * fROM users WHERE user_id = ?", [$user_id]); //한줄 결과값 가져오기
        if(!$find) 
            return back("정보와 일치하는 아이디를 찾을 수 없습니다.");
        if($find->password !== hash("sha256", $password)) 
            return back("비밀번호가 다릅니다");
            $_SESSION['user'] = $find; //서버에서 받고 있는 변수 
            go("/", "로그인 되었습니다");
    }

    function logoutProcess() {
        unset($_SESSION['user']); //이전 함수들을 지워버리는 것
        go("/", "로그아웃이 되었습니다.");
    }
}