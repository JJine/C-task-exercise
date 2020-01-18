<?php
/**
 * 각종 편의 함수들의 집합
 */

 //view_path 지금 열어져있는 페이지가 어느 위치에 있는지 확인할 수 있음
function view($view_path, $data = []) {
    extract($data); //배열의 키값으로 변수를 선언 
    $view_path = VIEW."/$view_path.php";
    include VIEW."/header.php";
    include $view_path;
    include VIEW."/footer.php";
}

function back($message = "") {
    echo "<script>";
    if($message) echo "alert('$message');";
    echo "history.back();";
    echo "</script>";
    exit;
}

function go($url, $message = "") {
    echo "<script>";
    if($message) echo "alert('$message');";
    echo "location.href='$url';";
    //location = 브라우저 객체 
    echo "</script>";
    exit;
}

function movieName($mid) {
    $movieList = ["기생충", "극한직업", "롱오브더킹", "나랏말싸미", "봉오동전투"];
    return $movieList[$mid-1];
}