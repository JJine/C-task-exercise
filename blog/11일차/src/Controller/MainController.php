<?php

namespace Jine\Controller;

class MainController extends MasterController{
    public function index() {
        $this->view("index");
    }
}