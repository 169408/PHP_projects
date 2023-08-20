<?php

require_once "vendor/autoload.php";
require_once "config/connect.php";
require_once "page_control.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First idea</title>
</head>
<body>
    <h1>Hellow!</h1>
    <table border="1">
        <tr class="header">
            <td>Class id</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Number of schoolchilds</td>
        </tr>
        <?php
        foreach ($school as $class) {
        ?>
            <tr>
                <td><?= $class[0]?></td>
                <td><?= $class[1]?></td>
                <td><?= $class[2]?></td>
                <td><?= $class[3]?></td>
                <td><a href="lists.php?id=<?= $class[0]?>">Schoolchilds list</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <a href="schoolchilds.php">Look at the list of schoolchilds</a>
</body>
</html>
