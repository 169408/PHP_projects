<?php

class ProductsController
{
    private $connection;
    public $product_id;
    public $title;
    public $price;
    public $comments;

    public function __construct($connect)
    {
        $this->connection = $connect;
    }

    public function save() {
        if($this->product_id != null) {
            mysqli_query($this->connection, "UPDATE products SET title = '{$this->title}', price = {$this->price} WHERE product_id = {$this->product_id}");
        } else {
            mysqli_query($this->connection, "INSERT INTO products (title, price) VALUES ('{$this->title}', {$this->price})");
        }
    }

    public function create($parameters) {
        $this->title = $parameters["title"];
        $this->price = $parameters["price"];
        $this->save();
    }

    public function update($parameters) {
        $this->product_id = $parameters["product_id"];
        $this->title = $parameters["title"];
        $this->price = $parameters["price"];
        $this->save();
    }

    public function readById($id) {
        $record = mysqli_query($this->connection, "SELECT * FROM products WHERE product_id = $id");
        return $record;
    }

    public function readComments($product_id) {
        $records = mysqli_query($this->connection, "SELECT * FROM product_comms WHERE productId = $product_id");
        return $records;
    }

    public function comment_create($parameters) {
        $description = $parameters["description"];
        $author = $parameters["author"];
        $product_id = $parameters["product_id"];
        mysqli_query($this->connection, "INSERT INTO product_comms (description, author, productId) VALUES ('$description', '$author', $product_id)");
        mysqli_query($this->connection, "UPDATE products SET comments = comments + 1 WHERE product_id = $product_id");
    }

    public function actionView() {
        $records = mysqli_query($this->connection, "SELECT * FROM products");
        require_once VIEWS . '/products/view.php';
        return 1;
    }

    public function actionCreate() {
        require_once VIEWS . '/products/create.php';
        return 1;
    }

    public function actionUpdate() {
        require_once VIEWS . '/products/update.php';
        return 1;
    }

    public function actionCustomFile() {
        require_once VIEWS . '/products/customFile.php';
        return 1;
    }

    public function actionView_com() {
        require_once VIEWS . '/products/comments/view_com.php';
    }

    public function actionCreate_com() {
        require_once VIEWS . '/products/comments/create_com.php';
    }

    public function actionComments($parameter) {
        $actionString = "action" . ucfirst($parameter);
        $this->$actionString();
        return 1;
    }
}