<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class UserController extends MasterController {
    public function register() 
    {
        $this->render("user/register");
    }

    public function registerProcess()
    {
        // Lib::redirect("/", "회원가입이 성공적으로 이루어졌습니다.");
        // exit;
        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $passwordc = $_POST['passwordc'];
        $username = $_POST['username'];

        //입력값 검증 
        /** 
         * 회원 아이디 : 5글자 이상 10글자 이하로 하고 오직 영문과 숫자만 올 수 있다.
         * 비밀번호 : 8글자 이상
         * 회원이름 : 한글만 1글자 이상
         * 비밀번호와 비밀번호 확인이 일치하는지 체크
         */

         $errors = [];
         if(!preg_match("/^[a-zA-Z0-9]{5,10}$/", $userid)) {
            $errors['userid'] = "회원아이디는 영문 숫자로 5글자 이상 10글자 이하여야합니다.";
         }
        

         if(mb_strlen($password) < 7 ){
            $errors['password'] = "비밀번호는 8글자 이상이여야 합니다.";
         }

         if(!preg_match("/^[ㄱ-ㅎㅏ-ㅣ가-힣]{1,}$/", $username)) {
            $errors['username'] = "회원이름은 1글자 이상이여야합니다.";
         }

         if($password !== $passwordc ) {
             $error['password'] = "비밀번호가 일치하지 않습니다.";
         }

         if(count($errors) != 0) {
            $this->render("user/register", ['errors'=> $errors]);
            return;
         }
         

        $sql = "INSERT INTO `users` (`id`, `name`, `password`, `level`) 
        VALUES (?, ?, PASSWORD(?), 1)"; //``붙이는 걸 습관적으로 해야한다. 예약어가 들어오면 예기치 못한 사태가 벌어짐
        $cnt = DB::execute($sql, [$userid, $username, $password]);
        // var_dump($cnt);
        // exit;
        if($cnt == 1) {
            Lib::redirect("/user/login", "회원가입이 성공적으로 이루어졌습니다.");
        } else {
            Lib::redirect("/user/register", "회원가입이 실패했습니다.");
        }    
    }
    public function login() {
        $this->render('/user/login');
    }

    public function loginProcess() {
        $userid = $_POST['userid'];
        $password = $_POST['password'];

        $errors = [];
        if(trim($userid) == "") $error['userid'] = "유저 아이디는 공백일 수 없습니다.";
        if(trim($password) == "") $error['password'] = "비밀번호는 공백일 수 없습니다.";
     
        if(count($errors) != 0) {
            $this->render("user/login", ['errors' => $errors]);
            return;
        }
        $user = user()->login($userid, $password);

        $sql = "SELECT * FROM `users` WHERE `id` = ? AND `password` = PASSWORD(?)";
        $user = DB::fetch($sql, [$userid, $password]);

        if($user == null) {
            Lib::redirect("/user/login", "아이디 또는 비밀번호가 올바르지 않습니다.");
        }

        session()->set("user", $user);
        Lib::redirect("/", "로그인 완료");
    }

    public function logout() {
        user()->logout();
        Lib::redirect("/", "로그아웃 완료");
    }

}