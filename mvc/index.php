<?php

require_once "database/DatabaseConnection.php";
require_once "classes/TaskController.php";


$dbConnection = DatabaseConnection::getInstance();
$connect = $dbConnection->getConnection();

$records = mysqli_query($connect, "SELECT * FROM tasks");

$task_controller = new TaskController($connect);

if (isset($_POST["submit_create"])) {
    $parameters = $_POST;
    unset($parameters["submit_create"]);
    $task_controller->add($parameters);
}

if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $task_controller->delete($id);
}

if(isset($_GET["done"])) {
    $id = $_GET["done"];
    $task_controller->done($id);
}

?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MVC</title>
</head>
<body>
<form action="index.php" method="post">
    <h2>Create new task</h2>
    <p>Title</p>
    <input type="text" name="title" placeholder="title" />
    <p>Task description</p>
    <textarea name="task_description" cols="40" rows="10"></textarea>
    <button type="submit" name="submit_create">Submit</button>
</form>
<?php
if($records->num_rows != 0) {
?>
    <table border="1">
        <tr>
            <td class="primary_key">Task id</td>
            <td>Title</td>
            <td>Task description</td>
            <td class="done">Done</td>
        </tr>
        <?php
        while($record = mysqli_fetch_assoc($records)) {
        ?>
        <tr>
            <td class="primary_key"><?=$record["task_id"]?></td>
            <td><?=$record["title"]?></td>
            <td><?=$record["task_description"]?></td>
            <td class="done"><?=$record["done"]?></td>
            <td class="execute"><a href="index.php?done=<?=$record["task_id"]?>">done this</a></td>
            <td class="delete"><a href="index.php?delete=<?=$record["task_id"]?>">delete this</a></td>
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
