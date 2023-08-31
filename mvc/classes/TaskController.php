<?php

require_once "TaskModel.php";

class TaskController {
    private $connect;

    public function __construct($connect) {
        $this->connect = $connect;
    }

    public function add($parameters) {
        $task_model = new TaskModel($this->connect);
        $task_model->create($parameters);
        header("Location: index.php");
    }

    public function delete($id) {
        $task_model = new TaskModel($this->connect);
        $task_model->delete($id);
        header("Location: index.php");
    }

    public function done($id) {
        $task_model = new TaskModel($this->connect);
        $task_model->done($id);
        header("Location: index.php");
    }
}