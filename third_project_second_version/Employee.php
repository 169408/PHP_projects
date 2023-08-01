<?php

class Employee {
    public $name;
    public $price_of_hour;
    public $free;
    public $which_cars_repairs;
    public $balance;

    public function __construct($properties){
        $this->name = $properties["name"];
        $this->price_of_hour = $properties["price_of_hour"];
        $this->free = $properties["free"];
        $this->which_cars_repairs = $properties["which_cars_repairs"];
    }
    public function carry_diagnostic($broken_car) {
        echo "Current breakdown: " . $broken_car->current_breakdown . "<br/>";
        $problem = rand(0, 1);
        return $this->repair($broken_car, $problem);
    }
    public function repair($broken_car, $problem) {
        if(!$problem) {
            echo "Pinda rulu. Sorry, we can't help You. Drive on to SS<br/>";
            return 0;
        } else {
            $broken_car->current_breakdown = "it's OK";
            echo "We have successfully repaired your car! Be more careful in the future :)<br/>";
            return 1;
        }
    }
}