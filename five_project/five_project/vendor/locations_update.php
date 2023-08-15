<?php

require_once "../config/connect.php";

$id = $_POST["id"];
$location_title = $_POST["location_title"];
$area = $_POST["area"];

mysqli_query($connect, "UPDATE locations SET location_title='$location_title', area=$area WHERE location_id=$id");
header("Location: ../index.php");
