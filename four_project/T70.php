<?php

class T70 {
    public $name = "T70";
    public $state;

    public function change_state($state, $states, $success_or_fail, $Admonition, $Praise, $essence) {
        $index = array_search($state, $states);
        $phraes = ["Oh God, You so good!", "Exelent", "You did not cope with the task", "Idiot..."];
        if($success_or_fail) {
            echo $phraes[rand(0, 1)] . "<br/>";
            if($index == count($states)-1) {
                for($j = 0; $j < count($Praise); $j++) {
                    $Praise[$j]->count_praise();
                }
                return "praise";
            }
            $index+=2;
            if($index > count($states)-1) {
                $index = count($states)-1;
            }
            $this->state = $states[$index];
            $essence->change($this, $this->state, 1);
            return "Success!";
        }
        echo $phraes[rand(2, 3)] . "<br/>";
        if($index == 0) {
            for($j = 0; $j < count($Admonition); $j++) {
                $Admonition[$j]->count_admonition();
            }
            return "admonition";
        }
        $index-=2;
        if($index < 0) {
            $index = 0;
        }
        $this->state = $states[$index];
        $essence->change($this, $this->state, 0);
        return "Fail :(";
    }
}