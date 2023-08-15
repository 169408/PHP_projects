<?php

require_once "../config/connect.php";

$id = $_POST["id"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$age = $_POST["age"];

mysqli_query($connect, "UPDATE players SET name='$name', surname='$surname', age=$age WHERE id_player=$id");
header("Location: ../index.php");