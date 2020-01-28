<?php 

namespace Jine\Controller;

class BoardController {
    public function view($idx) {
        echo "{$idx}번 글입니다.";
    }
}