<?php

class DatabaseConnection {
    private static $instance = null;
    private $connect;

    private function __construct()
    {
        $this->connect = mysqli_connect("127.0.0.1", "root", "ioskillMy_bra1n", "darius");

        if(!$this->connect) {
            die("Connection error");
        }
    }

    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connect;
    }
}