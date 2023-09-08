<?php

class ProductsController
{
    private $connect;

    public function __construct($connect)
    {
        $this->connection = $connect;
    }

    public function actionList() {
        echo "ProductsController actionList";
        return 1;
    }

    public function actionCreate() {
        echo "ProductsController actionCreate";
        return 1;
    }
}