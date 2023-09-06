<?php

class NewsController
{

    public function actionIndex() {
        echo "NewsController actionIndex";
        header("Location: ../views/news.view.php");
    }
}