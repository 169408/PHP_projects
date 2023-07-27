<?php

class Auto {
    public $name;
    public $output_year;
    public $color;
    public $place_of_production;
    public $current_breakdown;

    public function __construct($properties){
        $this->name = $properties["name"];
        $this->output_year = $properties["output_year"];
        $this->color = $properties["color"];
        $this->place_of_production = $properties["place_of_production"];
        $this->current_breakdown = $properties["current_breakdown"];
    }
    public function getName() {
        return $this->name;
    }
    public function getOutputYear() {
        return $this->output_year;
    }
    public function getColor() {
        return $this->color;
    }
    public function getPlaceOfProduction() {
        return $this->place_of_production;
    }
    public function getCurrentBreakdown() {
        return $this->current_breakdown;
    }
}