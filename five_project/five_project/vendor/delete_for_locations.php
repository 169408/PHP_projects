<?php

require_once "../config/connect.php";

$id = $_GET["id"];

mysqli_query($connect, "DELETE FROM locations WHERE location_id=$id");
header("Location: ../index.php");