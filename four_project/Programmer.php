<?php

class Programmer {
    public $name;
    public $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function work() {
        return rand(0, 1);
    }
}