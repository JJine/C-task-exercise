<?php

include_once "autoload.php";

$h1 = new Jine\Student("예진", ["성철", "지수"], 1, "수원");
$h2 = new Jine\Student("용두", ["혜란", "소라"], 2, "수프트");

// $h->setName("예진");
// $h->insertHobby("성철");
// $h->insertHobby("지수");


Jine\Lib::dump($h1); 
Jine\Lib::dump($h2);

// $h3 = clone $h1; //clone = 깊은 복사
// $h3->setName("복제인간");
// dump($h3);
// dump($h1);

//모든 프로그래밍 언어에서는 object는 참조기반으로 설정된다. (mutable)
//pre 태그를 사용하면 예쁘게 보여진다.
//var_dump , echo 

//echo 는 배열 읽을 수가 없다.
