<?php

use myfrm\Validator;
if(isset($_POST["title"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $author = $_POST["author"];
    $fillable = ["title", "description", "author"];
    $data = load($fillable);
    $rules = [
            "title" => [
                "required" => true,
                "min" => 5,
                "max" => 90
            ],
            "description" => [
                "required" => true,
                "min" => 10,
                "max" => 150
            ],
            "author" => [
                "required" => true,
                "min" => 2,
                "max" => 30
            ],
    ];

    // validation
    $validator = new Validator();
    $validation = $validator->validte($data, $rules);
    if(!$validation->hasErrors()) {
        $this->create(["title" => $title, "description" => $description, "author" => $author]);
        $_SESSION["success"] = "OK";
        redirect(PATH . "/news/create");
    } else {
        $_SESSION["error"] = "DB error";
    }
//    $errors = [];
//    for($i = 0; $i < count($fillable); $i++) {
//        if(empty(trim($data[$fillable[$i]]))) {
//            $errors[$fillable[$i]] = "$fillable[$i] is required";
//        }
//    }
//    if(empty($errors)) {
//        $this->create(["title" => $title, "description" => $description, "author" => $author]);
//        redirect(PATH . "/news/create");
//    }
}
?>
<?php
require_once "parts/header.php";
get_alerts();
?>

<main class="content">
    <div class="container">
        <h1>Create</h1>
        <form action="" method="post">
            <p>Title: </p>
            <input type="text" name="title" placeholder="title" value="<?= old("title");?>" />
            <?= isset($validation) ? $validation->listErrors("title") : ''; ?>
            <p>Description: </p>
            <textarea name="description" cols="20" rows="10"><?= old("description");?></textarea>
            <?= isset($validation) ? $validation->listErrors("description") : ''; ?>
            <p>Author: </p>
            <input type="text" name="author" value="<?= old("author");?>" />
            <?= isset($validation) ? $validation->listErrors("author") : ''; ?>
            <button type="submit">Submit</button>
        </form>
        <div class="material">
            <h2>Some fun</h2>
            <img src="https://static.wikia.nocookie.net/75dcd116-5fbc-4a82-be2e-dff8b6b88892/scale-to-width/755" alt="1" />
        </div>
    </div>
</main>
<?php require_once "parts/footer.php"?>
