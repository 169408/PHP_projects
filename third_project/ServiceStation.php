<?php

class ServiceStation {

    public function possibility($employee, $broken_car, $employees) {
        if($employee->free) {
            $emp_keys = array_keys($employee->which_cars_repairs);
            $brc_keys = array_keys(get_object_vars($broken_car));
            $same_keys = [];
            for($i = 0; $i < count($emp_keys); $i++) {
                for($j = 0; $j < count($brc_keys); $j++) {
                    if($emp_keys[$i] == $brc_keys[$j]) {
                        array_push($same_keys, $emp_keys[$i]);
                    }
                }
            }
            if(!empty($same_keys)) {
                for($i = 0; $i < count($same_keys); $i++) {
                    if(is_array(($employee->which_cars_repairs)[$same_keys[$i]])) {
                        if(in_array(get_object_vars($broken_car)[$same_keys[$i]], ($employee->which_cars_repairs)[$same_keys[$i]])) {
                            $employee->current_mission = $broken_car;
                            return "I'm free";
                        }
                    }
                    if(($employee->which_cars_repairs)[$same_keys[$i]] == get_object_vars($broken_car)[$same_keys[$i]]) {
                        $employee->current_mission = $broken_car;
                        return "I'm free";
                    }
                }
            } else if(in_array("Universal", $employee->which_cars_repairs)) {
                $employee->current_mission = $broken_car;
                return "I'm free";
            }
            if(in_array("Universal", $employee->which_cars_repairs)) {
                $count = 0;
                for($i = 0; $i < count($employees); $i++) {
                    if($employees[$i]->free) {
                        $count++;
                    }
                }
                if($count == 1) {
                    $employee->current_mission = $broken_car;
                    return "I'm free";
                }
            }
            return "I'm free, but I can't help you";
        }
        return "I'm bussy";
    }
}