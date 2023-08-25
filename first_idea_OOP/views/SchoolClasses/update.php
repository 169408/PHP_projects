<?php
require_once "../../vendor/autoload.php";
require_once "../../database/DatabaseConnection.php";
require_once "../../classes/SchoolClass.php";
require_once "../../classes/SchoolChild.php";

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

$schoolclass = new SchoolClass($connect);

if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $number = $_POST["number"];
    $schoolclass->update(["class_id" => $id, "first_name" => $first_name, "last_name" => $last_name, "number" => $number]);
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <title>Update class</title>
</head>
<body>
<form action="" method="post">
    <p>Id, Whose record u want to overwrite</p>
    <input type="text" name="id" placeholder="id" <?php if(isset($_GET["id"])) {?> value="<?=$_GET["id"]?> <?php }?>"/>
    <p>First name</p>
    <input type="text" name="first_name" placeholder="first name" />
    <p>Last name</p>
    <input type="text" name="last_name" placeholder="last name" />
    <p>Number of schoolchilds</p>
    <input type="text" name="number" placeholder="number" />
    <button type="submit">Submit</button>
</form>
</body>
</html>
