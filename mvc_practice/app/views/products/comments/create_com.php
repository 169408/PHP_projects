<?php
    if(isset($_POST["submit"])) {
        $description = $_POST["description"];
        $author = $_POST["author"];
        $product_id = $_POST["product_id"];
        $this->comment_create(["description" => $description, "author" => $author, "product_id" => $product_id]);
    }
?>
<?php require_once VIEWS . '/products/parts/header.php'; ?>
<main class="content">
    <div class="container">
        <h1>Add comment</h1>
        <form action="" method="post">
            <p>Description: </p>
            <textarea name="description" cols="20" rows="10"></textarea>
            <p>Author: </p>
            <input type="text" name="author" placeholder="author" />
            <input type="hidden" name="product_id" value="<?=$_POST["product_id"]?>" />
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</main>
<?php require_once VIEWS . '/products/parts/footer.php'; ?>
