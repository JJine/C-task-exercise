<?php

namespace Jine;

class Student extends Human {
    public $code;
    public $school;

    public function __construct(string $name = "", array $hobbies = [], int $code = 0, string $school) {
        parent::__construct($name, $hobbies);
        $this->code = $code;
        $this->school = $school;
    }

    public function setCode(int $code) {
        $this->code = $code;
    }

    public function setSchool(string $name) {
        $this->school = $name;
    }
} 