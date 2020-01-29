<?php 

namespace Jine;

class Human {
    //클래스는 기본적으로 멤버변수와 매서드로 이루어져있다.
    //멤버변수 : 해당 클래스의 속성 (ex. 학생 이름, 나이, 성별 등 가지고 있는 값들을 의미함)
    //매서드 : 해당 클래스의 기능 (ex. 걷기, 먹기, 자기)
    //멤버변수 선언 순서 : 접근제어자 _ 변수이름;

    public $name;
    public $hobbies = []; //배열로 초기화 가능

    //매서드 선언 순서 :  접근제어자 _function_ 매소드 이름(파라메터) [:리턴타입]
    //count() : 배열의 길이를 재는 것
    //in_array(mixed) mixed 는 타입 상관없이 값 아무거나 가져와도 된다는 뜻 
    
    //지정된 취미가 있는지 검사하는 매서드 
    public function hasHobby(string $hobby) : bool {
        return in_array($hobby, $this->hobbies);
    //     for($i = 0; $i < count($this->hobbies); $i++) {
    //         if($this->hobbies[$i] == $hobby) {
    //             return true;
    //         }
    //     } 
    //     return false;
    // }
    }
    //취미를 넣어주는 매서드
    public function insertHobby(string $hobby) {
        $this->hobbies[] = $hobby; //속도는 이게 더 빠름
        // array_push($this->hobbies, $hobby); //이건 별도의 함수 호출을 만듦
    }
 
    //이름 설정하는 매서드
    public function setName(string $name) {
        $this->name = $name;
    }

    public function __construct($name ="", $hobbies =[]) {
        $this->name = $name;
        $this->hobbies = $hobbies;
    }

    //public, private, protected, default
    //public은 외부적으로 사용이 가능하고, private는 내부적으로 사용이 가능하다.
    //private에서 뜯지말라는 요소를 설계해주는 것 
}

// //마법상수
// //constant != variable
// echo __DIR__;
// echo "<br>";

// echo __LINE__;
// echo __NAMESAPCE__; //아직 없음 

// /**
//  * __FUNCTION__
//  *
//  */