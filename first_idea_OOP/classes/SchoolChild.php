<?php

class SchoolChild {
    private $connection;
    public $schoolchild_id;
    public $name;
    public $surname;
    public $city;
    public $class_id;

    public function __construct($connect)
    {
        $this->connection = $connect;
    }

    public function save() {
        if($this->schoolchild_id !== null) {
            mysqli_query($this->connection, "UPDATE schoolchilds SET name = '{$this->name}', surname = '{$this->surname}', city = '{$this->city}', class_id = {$this->class_id} WHERE schoolchild_id = {$this->schoolchild_id}");
        } else {
            mysqli_query($this->connection, "INSERT INTO schoolchilds (name, surname, city, class_id) VALUES ('{$this->name}', '{$this->surname}', '{$this->city}', {$this->class_id})");
        }
    }

    public function create($parameters) {
        $this->name = $parameters["name"];
        $this->surname = $parameters["surname"];
        $this->city = $parameters["city"];
        $this->class_id = $parameters["class_id"];
        $this->save();
    }

    public function readAll() {
        $records = mysqli_query($this->connection, "SELECT * FROM schoolchilds");
        $childs = [];
        while($record = mysqli_fetch_assoc($records)) {
            $child = new SchoolChild($this->connection);
            $child->schoolchild_id = $record["schoolchild_id"];
            $child->name = $record["name"];
            $child->surname = $record["surname"];
            $child->city = $record["city"];
            $child->class_id = $record["class_id"];
            array_push($childs, $child);
        }
        return $childs;
    }

    public function update($properties) {
        $this->schoolchild_id = $properties["schoolchild_id"];
        $this->name = $properties["name"];
        $this->surname = $properties["surname"];
        $this->city = $properties["city"];
        $this->class_id = $properties["class_id"];
        $this->save();
    }
}