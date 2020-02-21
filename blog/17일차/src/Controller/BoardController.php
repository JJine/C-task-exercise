<?php

namespace Jine\Controller;

use Jine\App\{DB, Lib};

class BoardController {
    public function write() {
        include_once __SRC . "/view/write.php";
    }   

    public function writeProcess() {
        extract($_POST);
        // $dateTime = $date . " " . ($time == ""  ? "00:00:00" : $time . ":00");

        // if($title == "" || $content = "" ) {
        //     echo ""
        // }
        $sql = "INSERT INTO posts (`userid`, `title`, `sub_title`, `category`, `content`,  `date`) VALUES (?,?,?,?,?,?) ";
        $result = DB::execute($sql, [user()->get()->id, $title, $sub_title, $category, $content,  date("Y-m-d H:i:s") ]);

        function autolink($content) {
            $pattern = "/(http|https|ftp|mms):\/\/[0-9a-z-]+(\.[_0-9a-z-]+)+(:[0-9]{2,4})?\/?";       // domain+port
            $pattern .= "([\.~_0-9a-z-]+\/?)*"; // sub roots
            $pattern .= "(\S+\.[_0-9a-z]+)?"; // file & extension string
            $pattern .= "(\?[_0-9a-z#%&=\-\+]+)*/i"; // parameters
            $replacement = '<a href=\\0" target="_blank">\\0</a>';
            return preg_replace($pattern, $replacement, $content, -1);
     
            $content = str_replace('&amp;','&', $content);
            $content = str_replace('&quot;','"', $content);

            return preg_replace($pattern, $replacement, $content, -1);
        echo $content;
        }
        // $allowed_ext = array('jpg','jpeg','png','gif');

        // $name = $_FILES['img']['name'];
        // $error = $_FILES['img']['error'];
        // $ext = array_pop(explode('.', $name));
        
        // if(!in_array($ext, $allowed_ext)) {
        //     echo "허용되지 않는 확장자입니다.";
        //     exit;
        // }
        
        // if( $error != UPLOAD_ERR_OK ) {
        //     switch( $error ) {
        //         case UPLOAD_ERR_INI_SIZE:
        //         case UPLOAD_ERR_FORM_SIZE:
        //             echo "파일이 너무 큽니다. ($error)";
        //             break;
        //         case UPLOAD_ERR_NO_FILE:
        //             echo "파일이 첨부되지 않았습니다. ($error)";
        //             break;
        //         default:
        //             echo "파일이 제대로 업로드되지 않았습니다. ($error)";
        //     }
        //     exit;
        // }
        
        // if(move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$name)){
        //     echo 'uploads/'.$name;
        // } else {
        //     echo "이미지 업로드를 실패하였습니다.";
        // }
        // $result = [ $title, $sub_title, $category, $content];
        if($result != 1) {
            message ($result);
        } else {
            message ("성공적으로 작성이 완료되었습니다.");
        }
    }

    public function getListpage() {
        include_once __SRC ."/view/header.php";
        include_once __SRC ."/view/getList.php";
    }
    
    public function list($idx = 0) 
    {

        $user = user();
        if(!$user->checkLogin()) {
            Lib::json(['success'=>false, 'msg'=>'로그인 후 시도하세요']);
        } else {
            $sql = "SELECT * FROM posts WHERE userid = ? LIMIT {$idx}, 9";
            $list = DB::fetchAll($sql, [$_SESSION['user']->id]);
            echo json_encode($list);
            // Lib::json(['success'=>true, 'list'=>$list]);
        }
    } 
    
    public function delete() {
        header("Content-Type","application/json");
        extract($_GET);
        // echo ($id);
        // exit;
        $user = user();

        $sql = "SELECT * FROM posts WHERE userid = ? AND id = ?";
        $todo = DB::fetch($sql, [$_SESSION['user']->id, $id]);

        if($todo == null) {
            echo json_encode($todo);
        }
        $sql = "DELETE FROM posts WHERE id = ?";
        $result = DB::execute($sql, [$id]);
        echo json_encode($result);
    }

    // public function read() {
    //     include_once __SRC . "/view/readView.php";
    // }
}