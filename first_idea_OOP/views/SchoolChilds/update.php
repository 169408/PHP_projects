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
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $city = $_POST["city"];
    $class_id = $_POST["class_id"];
    $schoolchilds->update(["schoolchild_id" => $id, "name" => $name, "surname" => $surname, "city" => $city, "class_id" => $class_id]);
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <title>Create new schoolchild</title>
</head>
<body>
<form action="" method="post">
    <p>Id, Whose record u want to overwrite</p>
    <input type="text" name="id" placeholder="id" />
    <p>Name</p>
    <input type="text" name="name" placeholder="name" />
    <p>Surname</p>
    <input type="text" name="surname" placeholder="surname" />
    <p>City</p>
    <input type="text" name="city" placeholder="city" />
    <p>Class id</p>
    <input type="text" name="class_id" placeholder="class id" />
    <button type="submit">Submit</button>
</form>
</body>
</html>
