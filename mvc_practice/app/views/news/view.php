<?php require_once VIEWS . "/news/parts/header.php"?>
    <main class="content">
        <div class="container">
            <h1>Read All</h1>
            <table border="1">
                <tr class="roof">
<!--                    --><?php
//                    $keys = array_keys(mysqli_fetch_assoc($records));
//                    print_r($keys);
//                    ?>
                    <td class="primary_key">Id</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Author</td>
                </tr>
                <?php
                while($record = mysqli_fetch_assoc($records)) {
                ?>
                <tr>
                    <td class="primary_key"><?=$record["news_id"]?></td>
                    <td><?=hsc($record["title"])?></td>
                    <td><?=$record["description"]?></td>
                    <td><?=$record["author"]?></td>
                    <td class="update">
                        <form class="form_update" action="news/update" method="post">
                            <input type="hidden" name="news_id" value="<?=$record["news_id"]?>">
                            <button type="submit">update</button>
                        </form></td>
                    <td class="delete"><a href="news/view?id=<?=$record["news_id"]?>">delete</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </main>
<?php require_once VIEWS . "/news/parts/footer.php"?>
