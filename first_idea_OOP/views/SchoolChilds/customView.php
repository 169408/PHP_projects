<?php
require_once "../../vendor/autoload.php";
require_once "../../database/DatabaseConnection.php";
require_once "../../classes/SchoolClass.php";
require_once "../../classes/SchoolChild.php";

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

$schoolchilds = new SchoolChild($connect);

if(isset($_POST["submit"])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $city = $_POST["city"];
    $class_id = $_POST["class_id"];
    $records = $schoolchilds->readByCondition(["name" => $name, "surname" => $surname, "city" => $city, "class_id" => $class_id]);
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <title>View on the child by properties</title>
</head>
<body>
<form class="search" action="" method="post">
    <p>Child's name: </p>
    <input type="text" name="name" placeholder="name" />
    <p>Child's surname: </p>
    <input type="text" name="surname" placeholder="surname" />
    <p>Child's city: </p>
    <input type="text" name="city" placeholder="city" />
    <p>Child's class id: </p>
    <input type="text" name="class_id" placeholder="class id" />
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
        while($record = mysqli_fetch_assoc($records)) {
        ?>
        <tr>
            <td><?=$record["schoolchild_id"]?></td>
            <td><?=$record["name"]?></td>
            <td><?=$record["surname"]?></td>
            <td><?=$record["city"]?></td>
            <td><?=$record["class_id"]?></td>
        </tr>
        <?php
        };
        ?>
    </table>
    <?php
} else if(isset($_POST["submit"])) {
    echo "Not found";
}
?>
</body>
</html>