<?php

require_once "vendor/autoload.php";
require_once "config/connect.php";
require_once "page_control.php";

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
    foreach ($school_childs as $schoolchild) {
        ?>
        <tr>
            <td class="primary_key"><?= $schoolchild[0]?></td>
            <td><?= $schoolchild[1]?></td>
            <td><?= $schoolchild[2]?></td>
            <td><?= $schoolchild[3]?></td>
            <td><?= $schoolchild[4]?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
