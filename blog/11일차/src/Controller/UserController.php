<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class UserController extends MasterController {
    public function registerProcess() {
        extract($_POST);

        if(!preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/", $user_id)) {
            message("이메일 형식이 맞지 않습니다.");
            return;
        }

        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/", $password)) {
            message("비밀번호는 숫자, 영문, 특수문자 포함하여 8글자 이상 입력해주세요.");
            return;
        }

        if($password !== $passwordr) {
            message("비밀번호가 일치하지 않습니다.");
            return;
        }

        if(!preg_match("/^[ㄱ-ㅎㅏ-ㅣ가-힣]{1,}$/", $user_name)) {
            message("닉네임은 1글자 이상 입력해주세요.");
            return;
        }

        $sql = "INSERT INTO `users` (`id`, `user_name`, `password`) VALUES (?,?, PASSWORD(?))";
        $cnt = DB::execute($sql, [$user_id, $user_name, $password]);
        message("회원가입 완료되었습니다.");
    }

    public function loginProcess() {
        extract($_POST);

        if(trim($user_id) == "") {
            message("아이디는 공백일 수 없습니다.");
            return;
        }
            
        if(trim($password) == "") {
            message("비밀번호는 공백일 수 있습니다.");
            return;
        }

        // if(count($errors) != 0) {
        //     $this->view("index", ['errors' => $errors]);
        //     return;
        // }
        
        $user = user()->login($user_id, $password);

        $sql = "SELECT * FROM `users` WHERE `id` = ? AND `password` = PASSWORD(?)";
        $user = DB::fetch($sql, [$user_id, $password]);

        if($user == null) {
            message("아이디나 비밀번호가 맞지 않습니다.");
            return;
        }

        session()->set("user", $user);
        message("로그인이 완료되었습니다.");
    }

    public function logoutProcess() {
        user()->logout();
        message("로그아웃이 되었습니다.");
    }
}