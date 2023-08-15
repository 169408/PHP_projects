<?php

require_once "config/connect.php";

$record_id = $_GET["id"];
$record = mysqli_query($connect, "SELECT * FROM locations WHERE location_id=$record_id");
$record = mysqli_fetch_assoc($record);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update records for location</title>
</head>
<body>
    <form action="vendor/locations_update.php" method="post">
        <h2>Add records to the Locations table</h2>
        <input type="hidden" name="id" value="<?= $record_id?>">
        <p>Location_title: </p>
        <input type="text" name="location_title" placeholder="Location title" value="<?= $record['location_title']?>" />
        <p>Area: </p>
        <input type="text" name="area" placeholder="Area" value="<?= $record['area']?>"/>
        <br/><br/>
        <button type="submit">Update record</button>
    </form>
</body>
</html>
