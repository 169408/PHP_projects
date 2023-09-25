<?php

use myfrm\Validator;
get_alerts();
if(isset($_POST["title"])) {
    $title = $_POST["title"];
    $price = $_POST["price"];
    $fillable = ["title", "price"];
    $data = load($fillable);
    $rules = [
        "title" => [
            "required" => 1,
            "min" => 3,
            "max" => 70
        ],
        "price" => [
            "required" => true
        ],
    ];
    $validator = new Validator();
    $validation = $validator->validte($data, $rules);
    if($validation->hasErrors()) {
        print_arr($validation->getErrors());
        die;
    } else {
        echo "SUCCESS";
        $this->create(["title" => $title, "price" => $price]);
        redirect(PATH . "/products/create");
    }
}
?>
<?php require_once VIEWS . "/products/parts/header.php"?>
<main class="content">
    <div class="container">
        <h1>Create</h1>
        <form action="" method="post">
            <p>Title: </p>
            <input type="text" name="title" placeholder="title" value="<?= old("title");?>" />
            <?php
            if(isset($errors["title"])) {
                ?>
                <div class="valid"><p><?=$errors["title"]?></p></div>
                <?php
            }
            ?>
            <p>Price: </p>
            <input type="number" name="price" placeholder="price" value="<?= old("price");?>" />
            <?php
            if(isset($errors["price"])) {
                ?>
                <div class="valid"><p><?=$errors["price"]?></p></div>
                <?php
            }
            ?>
            <button type="submit">Submit</button>
        </form>
        <div class="material">
            <h2>Some fun</h2>
            <img src="https://static.wikia.nocookie.net/75dcd116-5fbc-4a82-be2e-dff8b6b88892/scale-to-width/755" alt="1" />
        </div>
    </div>
</main>
<?php require_once VIEWS . "/products/parts/footer.php"?>
