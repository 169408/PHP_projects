<?php

require_once "../config/connect.php";

$id = $_GET["id"];

mysqli_query($connect, "DELETE FROM players WHERE id_player=$id");
header("Location: ../index.php");