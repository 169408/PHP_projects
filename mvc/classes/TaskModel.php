<?php

class TaskModel {
    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function create($parameters) {
        $title = $parameters["title"];
        $task_description = $parameters["task_description"];
        mysqli_query($this->connect, "INSERT INTO tasks (title, task_description) VALUES ('$title', '$task_description')");
    }

    public function done($id) {
        mysqli_query($this->connect, "UPDATE tasks SET done = 'yes' WHERE task_id = $id");
    }

    public function delete($id) {
        mysqli_query($this->connect, "DELETE FROM tasks WHERE task_id = $id");
    }
}
