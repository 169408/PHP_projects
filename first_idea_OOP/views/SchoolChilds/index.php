<?php
require_once "../../vendor/autoload.php";
require_once "../../database/DatabaseConnection.php";
require_once "../../classes/SchoolClass.php";
require_once "../../classes/SchoolChild.php";

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gy</title>
</head>
<body>
<?php

$schoolchilds = new SchoolChild($connect);
$childs = $schoolchilds->readAll();

?>
<table border="1">
    <tr class="header">
        <td>Schoolchild id</td>
        <td>Name</td>
        <td>Surname</td>
        <td>City</td>
        <td>Class id</td>
    </tr>
    <?php
    foreach ($childs as $child) {
        ?>
        <tr>
            <td class="primary_key"><?=$child->schoolchild_id?></td>
            <td><?=$child->name?></td>
            <td><?=$child->surname?></td>
            <td><?=$child->city?></td>
            <td><?=$child->class_id?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>