<?php
function message($message) {
    if($message) echo "$message";
}

function red($view_path, $data= []) {
    extract($data);
    $view_path = __SRC . "/view/$view_path.php";
    include_once __SRC . "/view/header.php";
    include_once $view_path;
}

function back($message = "") {
    echo "<script>";
    if($message) 
        echo "alert('$message');";
        echo "history.back();";
        echo "</script>";
        exit;
}

function go($url, $message = "") {
    echo "<script>";
    if($message) 
        echo "alert('$message');";
        echo "location.href='$url';";
        echo "</script>";
        exit;
}