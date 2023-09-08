<?php

class NewsController
{
    private $connection;

    public function __construct($connect)
    {
        $this->connection = $connect;
    }

    public function actionView() {
        $records = mysqli_query($this->connection, "SELECT * FROM news");
        require_once VIEWS . '/news/view.php';
        return 1;
    }

    public function actionCreate() {
        require_once VIEWS . '/news/create.php';
        return 1;
    }
}