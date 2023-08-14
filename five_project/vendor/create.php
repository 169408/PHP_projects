<?php

require_once "../config/connect.php";

$location_title = $_POST["location_title"];
$area = $_POST["area"];

mysqli_query($connect, "INSERT INTO locations (location_title, area) VALUES ('$location_title', $area);");
echo $_POST["area"];
header("Location: ../index.php");

?>

