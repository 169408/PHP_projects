<?php

require_once "vendor/autoload.php";
require_once "config/connect.php";
require_once "page_control.php";

$id = $_GET["id"];
$list = mysqli_query($connect, "SELECT * FROM schoolchilds WHERE class_id = $id");
$list = mysqli_fetch_all($list);

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <td>Schoolchild Id</td>
        <td>Name</td>
        <td>Surname</td>
        <td>City</td>
        <td>Class id</td>
    </tr>
    <?php
    foreach ($list as $child) {
        ?>
        <tr>
            <td class="primary_key"><?= $child[0]?></td>
            <td><?= $child[1]?></td>
            <td><?= $child[2]?></td>
            <td><?= $child[3]?></td>
            <td><?= $child[4]?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
