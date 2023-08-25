<?php
    require_once "../../vendor/autoload.php";
    require_once "../../database/DatabaseConnection.php";
    require_once "../../classes/SchoolClass.php";
    require_once "../../classes/SchoolChild.php";

    $dbConnection = DatabaseConnection::getInstance();
    $connect = $dbConnection->getConnection();

    $schoolclass = new SchoolClass($connect);
    $classes = $schoolclass->readAll();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gy</title>
</head>
<body>
<table border="1">
    <tr class="header">
        <td>Class id</td>
        <td>First name</td>
        <td>Last name</td>
        <td>Number of schoolchilds</td>
    </tr>
    <?php
    foreach ($classes as $class) {
    ?>
    <tr>
        <td class="primary_key"><?=$class->class_id?></td>
        <td><?=$class->first_name?></td>
        <td><?=$class->last_name?></td>
        <td><?=$class->number?></td>
        <td><a href="update.php?id=<?= $class->class_id?>">Update</a></td>
    </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
