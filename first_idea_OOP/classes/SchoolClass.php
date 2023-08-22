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
        $query = mysqli_query($this->connection, "SELECT * FROM schoolclasses WHERE class_id = {$this->class_id}");
        if(empty($query)) {
            echo "empty";
        } else {
            echo "not empty";
        }
    }

    public function create($parameters) {
        $this->class_id = $parameters["class_id"];
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


}

?>