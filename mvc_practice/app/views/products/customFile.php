<?php
if(isset($_POST["product_id"]) && $_POST["product_id"] != "") {
    $id = $_POST["product_id"];
    $record = $this->readById($id);
}
?>
<?php require_once VIEWS . "/products/parts/header.php"; ?>
<main class="content">
    <div class="container">
        <h1>Read by Id</h1>
        <form action="" method="post">
            <p>Product Id: </p>
            <input type="text" name="product_id" />
            <button type="submit">Submit</button>
        </form>
        <?php
        if(isset($record) && $record->num_rows != 0) {
            ?>
            <div class="information">
                <table border="1">
                    <tr>
                        <td class="primary_key">Id</td>
                        <td>Title</td>
                        <td>Price</td>
                        <td>Comments</td>
                    </tr>
                    <?php
                    foreach($record as $value) {
                        ?>
                        <tr>
                            <td class="primary_key"><?=$value["product_id"]?></td>
                            <td><?=$value["title"]?></td>
                            <td><?=$value["price"]?></td>
                            <td><?=$value["comments"]?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        } elseif(isset($record)) {
            ?>
            <div class="not_found">
                <p>Not found the record with id = <?=$_POST["product_id"]?></p>
                <img src="https://media.tenor.com/kJc8xu5ZasUAAAAd/ninjago-kai-ninjago.gif" alt="2">
            </div>
            <?php
        }
        ?>
    </div>
</main>
<?php require_once VIEWS . "/products/parts/footer.php"; ?>