<?php
    if(isset($_POST["product_id"])) {
        $product_id = $_POST["product_id"];
        $records = $this->readComments($product_id);
    }
?>
<?php require_once VIEWS . "/products/parts/header.php" ?>
<main class="content">
    <div class="contaier">
<?php
if(isset($records) && $records->num_rows != 0) {
    ?>
    <div class="information">
        <table border="1">
            <tr>
                <td class="primary_key">Comment Id</td>
                <td>Description</td>
                <td>Author</td>
                <td>Product_id</td>
            </tr>
            <?php
            while($record = mysqli_fetch_assoc($records)) {
                ?>
                <tr>
                    <td class="primary_key"><?=$record["comment_id"]?></td>
                    <td><?=$record["description"]?></td>
                    <td><?=$record["author"]?></td>
                    <td><?=$record["productId"]?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
    <?php
} else {
    ?>
    <div class="not_found">
        <p>We can't found comments to this product</p>
    </div>
    <?php
}
    ?>
    </div>
</main>
<?php require_once VIEWS . "/products/parts/footer.php" ?>