<?php

class Essence {

    public function change($terminator, $state, $good_or_bad) {
        if($good_or_bad) {
            echo "State of " . $terminator->name . " has improved to " . $state . "<br/><br/>";
        } else {
            echo "State of " . $terminator->name . " has worsened to " . $state . "<br/><br/>";
        }
    }
}