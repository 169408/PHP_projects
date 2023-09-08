<?php require_once VIEWS . "/news/parts/header.php"?>
    <main class="contant">
        <div class="container">
            <h1>Read All</h1>
            <table border="1">
                <tr class="roof">
<!--                    --><?php
//                    $keys = array_keys(mysqli_fetch_assoc($records));
//                    print_r($keys);
//                    ?>
                    <td>Id</td>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Author</td>
                </tr>
                <?php
                while($record = mysqli_fetch_assoc($records)) {
                ?>
                <tr>
                    <td><?=$record["news_id"]?></td>
                    <td><?=$record["title"]?></td>
                    <td><?=$record["description"]?></td>
                    <td><?=$record["author"]?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </main>
<?php require_once VIEWS . "/news/parts/footer.php"?>
