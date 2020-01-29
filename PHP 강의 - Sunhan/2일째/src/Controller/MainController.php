<?php

namespace Jine\Controller;

class MainController extends MasterController
{
    public function index() {
        $this->render("main", ['msg'=>'안녕하세요 수원정보과학고입니다.', 'login'=>true]);
    }
}