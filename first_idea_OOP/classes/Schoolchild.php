<?php

class Schoolchild {
    public $schoolchild_id;
    public $name;
    public $surname;
    public $city;
    public $class_id;

    public function __construct($name, $surname, $city, $class_id) {
        //$this->schoolchild_id = $schoolchild_id;
        $this->name = $name;
        $this->surname = $surname;
        $this->city = $city;
        $this->class_id = $class_id;
    }
}