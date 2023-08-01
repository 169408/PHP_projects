<?php

class ServiceStation {

    public function possibility($broken_car, $employees) {
        $filter = array_keys($employees[0]->which_cars_repairs);
        $new_arr = [];
        for($i = 0; $i < count($filter); $i++) {
            if($i) {
                $employees = $new_arr;
            }
            $new_arr = [];
            for($j = 0; $j < count($employees); $j++) {
                if(is_array(($employees[$j]->which_cars_repairs)[$filter[$i]][0])) {
                    for($k = 0; $k < count(($employees[$j]->which_cars_repairs)[$filter[$i]]); $k++) {
                        if (in_array(get_object_vars($broken_car)[$filter[$i]], ($employees[$j]->which_cars_repairs)[$filter[$i]][$k])) {
                            array_push($new_arr, $employees[$j]);
                            break;
                        } else {
                            continue;
                        }
                    }
                } else if(in_array(get_object_vars($broken_car)[$filter[$i]], ($employees[$j]->which_cars_repairs)[$filter[$i]])) {
                    array_push($new_arr, $employees[$j]);
                }
            }
        }
        for($j = 0; $j < count($new_arr); $j++) {
            if($new_arr[$j]->free) {
                $new_arr[$j]->free = false;
                echo $new_arr[$j]->name . " can do this mission!<br/>";
                return $new_arr[$j]->carry_diagnostic($broken_car);
            }
        }
        echo "We haven't a free worker. Drive to the another SS.<br/>";
    }
}