<?php
    require_once "../../vendor/autoload.php";
    require_once "../../database/DatabaseConnection.php";
    require_once "../../classes/SchoolClass.php";
    require_once "../../classes/SchoolChild.php";

    $dbConnection = DatabaseConnection::getInstance();
    $connect = $dbConnection->getConnection();

    $schoolchilds = new SchoolChild($connect);

    if(isset($_POST["id"])) {
        $id = $_POST["id"];
        $record = $schoolchilds->readById($id);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <title>View on the child by Id</title>
</head>
<body>
<form class="search" action="" method="post">
    <p>Child's Id: </p>
    <input type="text" name="id" placeholder="id" />
    <button type="submit">Submit</button>
</form>
<?php
if(!empty($record)) {
?>
<table>
    <tr>
        <td>Schoolchild id</td>
        <td>Name</td>
        <td>Surname</td>
        <td>City</td>
        <td>Class id</td>
    </tr>
    <tr>
        <td><?=$record["schoolchild_id"]?></td>
        <td><?=$record["name"]?></td>
        <td><?=$record["surname"]?></td>
        <td><?=$record["city"]?></td>
        <td><?=$record["class_id"]?></td>
    </tr>
</table>
<?php
}
?>
</body>
</html>
