<?php require_once VIEWS . '/products/parts/header.php';?>
<main class="content">
    <div class="container">
        <h1>List of the products</h1>
        <table border="1">
            <tr class="roof">
                <td class="primary_key">Id</td>
                <td>Title</td>
                <td>Price</td>
                <td>Comments</td>
            </tr>
            <?php
            while($record = mysqli_fetch_assoc($records)) {
                ?>
                <tr>
                    <td class="primary_key"><?=$record["product_id"]?></td>
                    <td><?=hsc($record["title"])?></td>
                    <td><?=$record["price"]?></td>
                    <td>
                        <form class="form_update" action="products/comments/view_com" method="post">
                            <input type="hidden" name="product_id" value="<?=$record["product_id"]?>" />
                            <button type="submit"><?=$record["comments"]?></button>
                        </form>
                    </td>
                    <td class="update">
                        <form class="form_update" action="products/update" method="post">
                            <input type="hidden" name="product_id" value="<?=$record["product_id"]?>">
                            <button type="submit">update</button>
                        </form></td>
                    <td class="delete"><a href="products/view?id=<?=$record["product_id"]?>">delete</a></td>
                    <td class="add_comment"><form class="form_update" action="products/comments/create_com" method="post">
                            <input type="hidden" name="product_id" value="<?=$record["product_id"]?>">
                            <button type="submit">add comment</button>
                        </form></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</main>
<?php require_once VIEWS . '/products/parts/footer.php';?>

