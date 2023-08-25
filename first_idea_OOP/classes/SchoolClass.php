<?php



class SchoolClass {
    private $connection;
    public $class_id;
    public $first_name;
    public $last_name;
    public $number;

    public function __construct($connect)
    {
        $this->connection = $connect;
    }

    public function save() {
        if($this->class_id !== null) {
            mysqli_query($this->connection, "UPDATE schoolclasses SET first_name = '{$this->first_name}', last_name = '{$this->last_name}', number = '{$this->number}' WHERE class_id = {$this->class_id}");
        } else {
            mysqli_query($this->connection, "INSERT INTO schoolclasses (first_name, last_name, number) VALUES ('{$this->first_name}', '{$this->last_name}', '{$this->number}')");
        }
    }

    public function create($parameters) {
        $this->first_name = $parameters["first_name"];
        $this->last_name = $parameters["last_name"];
        $this->number = $parameters["number"];
        $this->save();
    }

    public function readAll() {
        $records = mysqli_query($this->connection, "SELECT * FROM schoolclasses");
        $classes = [];
        while($record = mysqli_fetch_assoc($records)) {
            $class = new SchoolClass($this->connection);
            $class->class_id = $record["class_id"];
            $class->first_name = $record["first_name"];
            $class->last_name = $record["last_name"];
            $class->number = $record["number"];
            array_push($classes, $class);
        }
        return $classes;
    }

    public function readById($id) {
        $record = mysqli_query($this->connection, "SELECT * FROM schoolclasses WHERE class_id = $id");
        $record = mysqli_fetch_assoc($record);
        return $record;
    }

    public function readByNumber($number) {
        $records = mysqli_query($this->connection, "SELECT * FROM schoolclasses WHERE number = $number");
        if(empty($records)) {
            return;
        }
        if($records->num_rows == 0) {
            return;
        }
        return $records;
    }

    public function readByChildsId($id) {
        $child = new SchoolChild($this->connection);
        $record = $child->readById($id);
        $class_id = $record["class_id"];
        $class = mysqli_query($this->connection, "SELECT * FROM schoolclasses WHERE class_id = $class_id");
        $class = mysqli_fetch_assoc($class);
        return $class;
    }

    public function update($properties) {
        $this->class_id = $properties["class_id"];;
        $this->first_name = $properties["first_name"];
        $this->last_name = $properties["last_name"];
        $this->number = $properties["number"];
        $this->save();
    }
}

?>