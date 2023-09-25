<?php

class NewsController
{
    private $connection;
    public $news_id;
    public $title;
    public $description;
    public $author;

    public function __construct($connect)
    {
        $this->connection = $connect;
    }

    public function save() {
        if($this->news_id !== null) {
            mysqli_query($this->connection, "UPDATE news SET title = '{$this->title}', description = '{$this->description}', author = '{$this->author}' WHERE news_id = {$this->news_id}");
        } else {
            mysqli_query($this->connection, "INSERT INTO news (title, description, author) VALUES ('{$this->title}', '{$this->description}', '{$this->author}')");
        }
    }

    public function create($parameters) {
        $this->title = $parameters["title"];
        $this->description = $parameters["description"];
        $this->author = $parameters["author"];
        $this->save();
    }

    public function update($parameters) {
        $this->news_id = $parameters["news_id"];
        $this->title = $parameters["title"];
        $this->description = $parameters["description"];
        $this->author = $parameters["author"];
        $this->save();
    }

    public function readById($id) {
        $record = mysqli_query($this->connection, "SELECT * FROM news WHERE news_id = $id");
        return $record;
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

    public function actionUpdate()
    {
        require_once VIEWS . '/news/update.php';
        return 1;
    }

    public function actionCustomFile() {
        require_once VIEWS . '/news/customFile.php';
        return 1;
    }
}