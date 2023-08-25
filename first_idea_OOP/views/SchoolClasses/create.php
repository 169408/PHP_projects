<?php
require_once "../../vendor/autoload.php";
require_once "../../database/DatabaseConnection.php";
require_once "../../classes/SchoolClass.php";
require_once "../../classes/SchoolChild.php";

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

$schoolclasses = new SchoolClass($connect);

if(isset($_POST["submit"])) {
    echo "tak";
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $number = $_POST["number"];
    $schoolclasses->create(["first_name" => $first_name, "last_name" => $last_name, "number" => $number]);
}
?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <title>Create new class</title>
</head>
<body>
<form action="" method="post">
    <p>First name</p>
    <input type="text" name="first_name" placeholder="first name" />
    <p>Last name</p>
    <input type="text" name="last_name" placeholder="last name" />
    <p>Number of schoolchilds</p>
    <input type="text" name="number" placeholder="number" />
    <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>
