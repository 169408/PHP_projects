<?php

class School_class {
    public $class_id;
    public $first_name;
    public $last_name;
    public $number;

    public function __construct($first_name, $last_name, $number)
    {
        //$this->class_id = $class_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->number = $number;
    }
}