<?php

require_once "config/connect.php";

$record_id = $_GET["id"];
$record = mysqli_query($connect, "SELECT * FROM players WHERE id_player='$record_id'");
$record = mysqli_fetch_assoc($record);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update records for player</title>
</head>
<body>
<form action="vendor/players_update.php" method="post">
    <h2>Update records for player</h2>
    <input type="hidden" name="id" value="<?=$record_id?>"/>
    <p>Name: </p>
    <input type="text" name="name" placeholder="name" value="<?= $record['name']?>" />
    <p>Surname: </p>
    <input type="text" name="surname" placeholder="surname" value="<?= $record['surname']?>"/>
    <p>Age: </p>
    <input type="number" name="age" placeholder="age" value="<?= $record['age']?>"/>
    <br/><br/>
    <button type="submit">Update record</button>
</form>
</body>
</html>
