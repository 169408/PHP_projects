<?php
if(isset($_POST["news_id"]) && $_POST["news_id"] != "") {
    $id = $_POST["news_id"];
    $record = $this->readById($id);
}
?>
<?php require_once VIEWS . "/news/parts/header.php"?>
<main class="content">
    <div class="container">
        <h1>Read by Id</h1>
        <form action="" method="post">
            <p>Id: </p>
            <input type="text" name="news_id" />
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
                    <td>Description</td>
                    <td>Author</td>
                </tr>
                <?php
                foreach($record as $value) {
                ?>
                <tr>
                    <td class="primary_key"><?=$value["news_id"]?></td>
                    <td><?=$value["title"]?></td>
                    <td><?=$value["description"]?></td>
                    <td><?=$value["author"]?></td>
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
            <p>Not found the record with id = <?=$_POST["news_id"]?></p>
            <img src="https://preview.redd.it/i-want-to-hear-your-unpopular-opinions-on-ninjago-v0-zz2rvq4c4xt81.jpg?auto=webp&s=5545862a49744b23e227962b131fa0b3d665cbba" alt="2">
        </div>
        <?php
        }
        ?>
    </div>
</main>
<?php require_once VIEWS . "/news/parts/footer.php"?>
