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

    public function readById($id) {
        $record = mysqli_query($this->connection, "SELECT * FROM schoolchilds WHERE schoolchild_id = {$id}");
        $record = mysqli_fetch_assoc($record);
        return $record;
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

    public function readByClassId($class_id) {
        $records = mysqli_query($this->connection, "SELECT * FROM schoolchilds WHERE class_id = $class_id");
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

    public function readByCondition($condition) {
        $searchString = '';
        $counter = 0;
        foreach ($condition as $parameter => $valueCondition) {
            if($valueCondition != "") {
                if($counter != 0) {
                    $searchString .= " and ";
                }
                $searchString .= $parameter . " = " . "\"$valueCondition\"";
                $counter++;
            }
        }
        if(empty($searchString)) {
            return;
        }
        $records = mysqli_query($this->connection, "SELECT * FROM schoolchilds WHERE $searchString");
        if($records->num_rows == 0) {
            return;
        }
        return $records;
    }
}