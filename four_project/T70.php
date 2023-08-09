<<<<<<< HEAD
<?php

class T70 {
    public $name = "T70";
    public $state;

    public function change_state($state, $states, $success_or_fail, $HR_T1000, $T1001, $essence) {
        $index = array_search($state, $states);
        $phraes = ["Oh God, You so good!", "Exelent", "You did not cope with the task", "Idiot..."];
        if($success_or_fail) {
            echo $phraes[rand(0, 1)] . "<br/>";
            if($index == count($states)-1) {
                $T1001->count_praise();
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
            $HR_T1000->count_admonition();
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
=======
<?php

class T70 {
    public $state;

    public function change_state($state, $states, $success_or_fail, $HR_T1000, $T1001) {
        $index = array_search($state, $states);
        $phraes = ["Oh God, You so good!", "Exelent", "You did not cope with the task", "Idiot..."];
        if($success_or_fail) {
            echo $phraes[rand(0, 1)] . "<br/>";
            if($index == count($states)-1) {
                $T1001->count_praise();
                return "praise";
            }
            $index++;
            $this->state = $states[$index];
            return "Success!";
        }
        echo $phraes[rand(2, 3)] . "<br/>";
        if($index == 0) {
            $HR_T1000->count_admonition();
            return "admonition";
        }
        $index--;
        $this->state = $states[$index];
        return "Fail :(";
    }
>>>>>>> 41bdbcec7820631a36937e9f139f4fe04334a2cb
}