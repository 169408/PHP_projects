<?php
require_once "../../vendor/autoload.php";
require_once "../../database/DatabaseConnection.php";
require_once "../../classes/SchoolClass.php";
require_once "../../classes/SchoolChild.php";

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

$schoolChilds = new SchoolChild($connect);

if(isset($_POST["submit"])) {
    $id = $_POST["id"];
    $records = $schoolChilds->readByClassId($id);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <p>Enter Class id: </p>
    <input type="text" name="id" placeholder="id" />
    <button type="submit" name="submit">Submit</button>
</form>
<?php
if(!empty($records)) {
    ?>
    <table>
        <tr>
            <td>Schoolchild id</td>
            <td>Name</td>
            <td>Surname</td>
            <td>City</td>
            <td>Class id</td>
        </tr>
        <?php
        foreach ($records as $record) {
        ?>
        <tr>
            <td><?=$record->schoolchild_id?></td>
            <td><?=$record->name?></td>
            <td><?=$record->surname?></td>
            <td><?=$record->city?></td>
            <td><?=$record->class_id?></td>
            <td><a href="update.php?id=<?=$record->schoolchild_id?>">Update</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
}
?>
</body>
</html>
