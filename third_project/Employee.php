<?php

class Employee {
    public $price_of_hour;
    public $free;
    public $which_cars_repairs;
    public $current_mission;

    public function __construct($properties){
        $this->price_of_hour = $properties["price_of_hour"];
        $this->free = $properties["free"];
        $this->which_cars_repairs = $properties["which_cars_repairs"];
    }
    public function carry_diagnostic($broken_car) {
        if($this->free) {
            if(empty($this->current_mission)) {
                return "No mission";
            }
            return get_object_vars($broken_car)["current_breakdown"];
        }
        return "I'm bussy";
    }
    public function repair($broken_car) {
        if($this->free) {
            if(!empty($this->current_mission)) {
                if(get_object_vars($broken_car)["current_breakdown"] == "everything is broken") {
                    return "Pinda rulu. Sorry, we can't help You. Drive on to SS";
                } else {
                    $broken_car->current_breakdown = "it's OK";
                    return "We have successfully repaired your car! Be more careful in the future :)";
                }
            }
            return "I have not a mission";
        }
        return "WTF? Check, I'm free or not...";
    }
}