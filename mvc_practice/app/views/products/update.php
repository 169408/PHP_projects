<?php
if(isset($_POST["title"])) {
    $product_id = $_POST["product_id"];
    $title = $_POST["title"];
    $price = $_POST["price"];
    $this->update(["product_id" => $product_id, "title" => $title, "price" => $price]);
}
?>
<?php require_once VIEWS . '/products/parts/header.php';?>
<main class="content">
    <div class="container">
        <h1>Update the product</h1>
        <form action="" method="post">
            <p>Product's ID: </p>
            <input type="text" name="product_id" value="<?php if(!empty($_POST["product_id"])) {echo $_POST["product_id"];} else {echo " ";} ?>" />
            <p>Title: </p>
            <input type="text" name="title" placeholder="title" />
            <p>Price: </p>
            <input type="number" name="price" placeholder="price" />
            <button type="submit">Update</button>
        </form>
        <div class="material">
            <h2>Some fun</h2>
            <img src="https://i.pinimg.com/1200x/70/17/99/7017991b1f1f51a22878605fad9a801a.jpg" alt="1">
        </div>
    </div>
</main>
<?php require_once VIEWS . '/products/parts/footer.php';?>
