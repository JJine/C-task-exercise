<?php

namespace Jine\Controller;

use Jine\App\{Lib, DB};

class UserController extends MasterController {
    public function registerProcess() {
        extract($_POST);
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        $passwordr = $_POST['passwordr'];
        $user_name = $_POST['user_name'];

        $errors = [];
        if(!preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/", $user_id)) {
            $errors['user_id'] = "이메일 형식이 맞지 않습니다.";
        }

        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/", $password)) {
            $errors['password'] = "비밀번호는 숫자, 영문, 특수문자 포함하여 8글자 이상 입력해주세요.";
        }

        if($password !== $passwordr) {
            $error['password'] = "비밀번호가 일치하지 않습니다.";
        }

        if(!preg_match("/^[ㄱ-ㅎㅏ-ㅣ가-힣]{1,}$/", $user_name)) {
            $errors['user_name'] = "닉네임은 1글자 이상 입력해주세요.";
        }

        if(count($errors) !=0) {
            $this->view("index", ['errors'=>$errors]);
            return;
        }

        $sql = "INSERT INTO `users` (`id`, `user_name`, `password`, `passwordr`) VALUES (?,?, PASSWORD(?), 1)";
        $cnt = DB::execute($sql, [$user_id, $user_name, $password]);
        if($cnt == 1) {
            Lib::redirect("/", "회원가입이 성공적으로 이루어졌습니다.");
        } else {
            Lib::redirect("/", "회원가입이 실패했습니다.");
        }
    }

    public function loginProcess() {
        extract($_POST);

        $user_id = $_POST['user_id'];
        $password = $_POST['password'];

        $errors = [];
        if(trim($user_id) == "") $errors['user_id'] = "아이디는 공백일 수 없습니다.";
        if(trim($password) == "") $errors['password'] = "비밀번호는 공백일 수 없습니다.";

        if(count($errors) != 0) {
            $this->view("/", ['errors' => $errors]);
            return;
        }
        $user = user()->login($user_id, $password);

        $sql = "SELECT * FROM `users` WHERE `id` = ? AND `password` = PASSWORD(?)";
        $user = DB::fetch($sql, [$user_id, $password]);

        if($user == null) {
            Lib::redirect("/", "아이디 또는 비밀번호가 올바르지 않습니다.");
        }

        session()->set("user", $user);
        Lib::redirect("/", "로그인 완료");
    }

    public function logoutProcess() {
        user()->logout();
        Lib::redirect("/", "로그아웃이 되었습니다.");
    }
}