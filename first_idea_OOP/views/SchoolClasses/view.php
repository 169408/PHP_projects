<?php
require_once "../../vendor/autoload.php";
require_once "../../database/DatabaseConnection.php";
require_once "../../classes/SchoolClass.php";
require_once "../../classes/SchoolChild.php";

$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

$schoolclasses = new SchoolClass($connect);

if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $record = $schoolclasses->readById($id);
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../assets/css.css" type="text/css">
    <meta charset="UTF-8">
    <title>View on the class by Id</title>
</head>
<body>
<form class="search" action="" method="post">
    <p>Class Id: </p>
    <input type="text" name="id" placeholder="id" />
    <button type="submit">Submit</button>
</form>
<?php
if(!empty($record)) {
    ?>
    <table>
        <tr>
            <td>Class id</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Number of schoolchilds</td>
        </tr>
        <tr>
            <td class="primary_key"><?=$record["class_id"]?></td>
            <td><?=$record["first_name"]?></td>
            <td><?=$record["last_name"]?></td>
            <td><?=$record["number"]?></td>
        </tr>
    </table>
    <?php
}
?>
</body>
</html>
